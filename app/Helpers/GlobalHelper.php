<?php
namespace App\Helpers;

use App\Models\RolePermissions;
use App\Models\Setups\Modules;
use App\Models\Setups\PageActions;
use App\Models\Setups\Pages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class GlobalHelper {
    private $active_page_actions;
    private $active_modules;
    private $breadcrumbs;
    private $restore;
    public function permissionStructure($activeActions = null) {
        $modModules = new Modules();
        $modPages = new Pages();
        $modPageAction = new PageActions();

        $modules = [];
        $pages = [];
        $actions = [];

        foreach ($modModules->orderBy('order','ASC')->get()->toArray() as $module) {
            $modules[$module['id']] = $module;
        }
        foreach ($modPages->orderBy('order','ASC')->get()->toArray() as $page) {
            $pages['module'][$page['module_id']][] = $page;
        }

        foreach ($modPageAction->orderBy('position','ASC')->get()->toArray() as $action) {
            $action['perm_campus'] = false;
            if(isset($activeActions) && in_array($action['id'], $activeActions)) {
                $action['perm_campus'] = true;
            }
            $actions[$action['page_id']][$action['type']] = $action;
        }

        $sideMenus = $this->buildStructure($modules, $pages, $actions);
        return $sideMenus;
    }

    public function buildStructure($modules, $pages, $actions) {
        $html = "";
        foreach ($modules as $module) {
            $html .= "<li data-key='module_" . $module['id'] . "'>";
            $html .= "<i data-lucide='" . $module['icon'] . "'></i>&nbsp;";
            $html .= $module["name_kh"];
            $html .= "<ul>";

            if (isset($pages['module'][$module['id']])) {
                foreach ($pages['module'][$module['id']] as $page) {
                    if (isset($actions[$page['id']])) {
                        //$act = $actions[$page['id']][$page['default_action']];
                        $html .= "<li data-key='page_" . $page['id'] . "'>";
                        $html .= "<i data-lucide='" . $page['icon'] . "'></i>&nbsp;";
                        $html .= $page["name_kh"];
                        $html .= "<ul>";
                        foreach ($actions[$page['id']] as $act) {
                            $html .= "<li
                                        data-active='". ($act['perm_campus'] == true ? 'true' : 'false') . "'
                                        data-selected='". ($act['perm_campus'] == true ? 'true' : 'false') . "'
                                        data-key='action_" . $act['id'] . "'>
                                   ";
                            $html .= $act["name_kh"];
                            $html .= "</li>";
                        }
                        $html .= "</ul>";
                        $html .= "</li>";
                    }
                }
            }
            $html .= "</ul>";
            $html .= "</li>";
        }
        return $html;
    }

    public function getActionsBy() {
        $pages = Pages::get()->toArray();
        $actions = PageActions::orderBy("position", "ASC")->get()->toArray();
        $actionsData = [];
        foreach ($actions as $action) {
            $actionsData[$action['page_id']][] = $action;
        }
        $pagesData = [];
        foreach ($pages as $page) {
            $pageActions = null;
            if (isset($actionsData[$page['id']])) {
                $pageActions = array_column($actionsData[$page['id']], 'id');
                foreach ($pageActions as $pa) {
                    $pagesData['page_actions'][$page['id']][] = $pa;
                }
            }
            if ($page['module_id'] !== null && $pageActions !== null) {
                foreach ($pageActions as $pa) {
                    $pagesData['module_actions'][$page['module_id']][] = $pa;
                }
            }
        }
        return $pagesData;
    }

    public function sideMenus() {
        $availableModules = [];
        $availablePages = [];

        $availableActions = Auth::user()->role->rolePermissions()->pluck("action_id");

        $modules = [];
        $pages = [];
        $actions = [];

        $pageActionsArr = Cache::remember('sidebar_actions_' . Auth::id(), 24 * 60 * 60, function () use ($availableActions){
            if (session("is_admin") == '2') {
                $pageActionsObj = DB::table("page_actions")->orderBy('position', 'ASC')->whereNull('deleted_at')->get();
            } else {
                $pageActionsObj = DB::table('page_actions')->whereIn('id', $availableActions)->orderBy('position', 'ASC')->get();
            }
            return json_decode(json_encode($pageActionsObj), true);
        });

        if (session('is_admin') == '2') {
            foreach ($pageActionsArr as $action) {
                $actions[$action['page_id']][$action['type']] = $action;
                $availablePages[] = $action['page_id'];
            }
        } else {
            foreach ($pageActionsArr as $action) {
                $actions[$action['page_id']][$action['type']] = $action;
                $availablePages[] = $action['page_id'];
            }
        }

        $availablePages = array_unique($availablePages);

        $pageArr = DB::table('pages')->whereIn('id', $availablePages)->orderBy('order')->whereNull('deleted_at')->get()->toArray();
        foreach ($pageArr as $page) {
            if ($page->module_id !== null) {
                $pages['module'][$page->module_id][] = $page;
                if (!in_array($page->module_id, $availableModules)) {
                    $availableModules[] = $page->module_id;
                }
            } else {
                $pages['root'][] = $page;
            }
        }

        $availableModules = array_unique($availableModules);
        $moduleObj = DB::table('modules')->whereIn('id', $availableModules)->orderBy('order')->whereNull('deleted_at')->get();
        $moduleArr = json_decode(json_encode($moduleObj), true);
        foreach ($moduleArr as $module) {
            $modules[$module['id']] = $module;
        }
        $sideMenus = $this->buildSideMenu($modules, $pages, $actions);
        $data['sidemenus'] = $sideMenus;
        $data['active_page_actions'] = $this->active_page_actions;
        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['restore'] = $this->restore;

        return $data;
    }

    public static function activePage($segment = 1, $url = '')
    {
        return request()->segment($segment) == $url ? 'active' : '';
    }

    public function activePageActions($page, $actions)
    {
        foreach ($actions[$page->id] as $type => $act) {
            $this->active_page_actions['action'][] = [
                "action_id" => $act['id'],
                "action_name" => $act['name'],
                "action_name_kh" => $act['name_kh'],
                "action_route" => $act['route_name'],
                "action_type" => $act['type']
            ];
        }
    }

    public function buildSideMenu($modules, $pages, $actions) {
        $html = "";
        foreach ($modules as $key => $module) {
            $html .= '<li class="menu menu-heading">';
            $html .= "<div class='heading'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-minus'><line x1='5 y1='12' x2='19' y2='12'></line></svg><span>".$module["name_kh"]."</span></div>";
            $html .= '</li>';

            if (isset($pages['module'][$module['id']])) {
                foreach ($pages['module'][$module['id']] as $k => $page) {

                    $current_route = explode(".", $page->default_action);

                    if (Request::routeIs($current_route[0].'.'.$current_route[1].'*')) {
                        $this->activePageActions($page, $actions);
                    }

                    $html .= '<li class="menu '.(Request::routeIs($current_route[0].'.'.$current_route[1].'*') ? 'active' : '') .'">';
                    $html .= '<a href="'.route($page->default_action).'" aria-expanded="false" class="dropdown-toggle">';
                    $html .= '<div class="">';
                    $html .= '<i data-lucide="'.$page->icon.'"></i>';
                    $html .= '<span>'.$page->name_kh.'</span>';
                    $html .= '</div>';
                    $html .= '</a>';
                    $html .= '</li>';
                }
            }
        }

        return $html;
    }

    public function hasPageAccess() {
        if (session('is_admin') == '2' OR (Route::currentRouteName() == 'dashboard.index') OR (Route::currentRouteName() == 'setups.users.password') OR (Route::currentRouteName() == 'setups.users.change')) {
            return true;
        }
        $modRP = new RolePermissions();
        $action_id = "";
        $action_id = Pages::where('default_action', Route::currentRouteName())->take(1)->first();
        if (!is_null($action_id)) {
            $res = $modRP->where('roles_id', Auth::user()->role_id)->take(1)->first();
        } else {
            $action_id = PageActions::where('route_name', Route::currentRouteName())->take(1)->first();
            if (!is_null($action_id)) {
                $action_id = $action_id->id;
                $res = $modRP->where('roles_id', Auth::user()->role_id)->where('action_id', $action_id)->take(1)->first();
            } else {
                $res = null;
            }
        }

        if ($res !== null) {
            return true;
        }
        return false;
    }
}
