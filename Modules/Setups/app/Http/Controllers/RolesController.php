<?php

namespace Modules\Setups\app\Http\Controllers;

use App\DataTables\Setups\RolesDataTable;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Models\RolePermissions;
use App\Models\Roles;
use App\Models\Setups\PageActions;
use App\Models\Setups\Pages;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('setups::roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $helper = new GlobalHelper();
        $tree = "";
        $tree .= "<ul>";
        $tree .= $helper->permissionStructure();
        $tree .= "</ul>";

        return view('setups::roles.create')->with('tree', $tree);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtPermission' => ['required', 'min:2', 'unique:roles,name'],
            'txtPermissionKh' => ['required'],
            'txtDescription' => '',
        ]);
        $helper = new GlobalHelper();
        $actionsBy = $helper->getActionsBy();

        $roleId = Roles::create([
            'name' => $request->txtPermission,
            'name_kh' => $request->txtPermissionKh,
            'description' => $request->txtDescription,
            'order' => '0',
            'slug' => Str::slug($request->txtPermission)
        ])->id;

        if ($request->has('ft_1')) {
            foreach ($request->ft_1 as $perm) {
                $perm = explode("_", $perm);
                $action_id = $perm[1];
                switch ($perm[0]) {
                    case 'module':
                        if (isset($actionsBy['module_actions'][$perm[1]])) {
                            foreach ($actionsBy['module_actions'][$perm[1]] as $action_item) {
                                $permData[] = [
                                    "roles_id" => $roleId,
                                    "action_id" => $action_item,
                                    "created_at" => date("Y-m-d H:i:s")
                                ];
                            }
                        }
                        break;
                    case 'page':
                        if (isset($actionsBy['page_actions'][$perm[1]])) {
                            foreach ($actionsBy['page_actions'][$perm[1]] as $action_item) {
                                $permData[] = [
                                    "roles_id" => $roleId,
                                    "action_id" => $action_item,
                                    "created_at" => date("Y-m-d H:i:s")
                                ];
                            }
                        }
                        break;
                    case 'action':
                        $permData[] = [
                            "roles_id" => $roleId,
                            "action_id" => $action_id,
                            "created_at" => date("Y-m-d H:i:s")
                        ];
                        break;

                    default:
                        flash()
                            ->translate('kh')
                            ->option('timeout', 2000)
                            ->error("ការបង្កើតបរាជ័យ", 'បញ្ហា')
                            ->flash();
                        return redirect()->route('setups.roles.index');
                        break;

                }
            }

            $modRolePermission = new RolePermissions();
            $modRolePermission->insert($permData);
        }

        flash()
            ->translate('kh')
            ->option('timeout', 2000)
            ->success('success_msg', 'success')
            ->flash();
        if ($request->submit == 'save') {
            return redirect()->route('setups.roles.index');
        }
        return redirect()->route('setups.roles.create');
    }

    public function edit($id) {
        $role = Roles::find($id);
        if ($role->id == 2) {
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error("អ្នកមិនអាចធ្វើបច្ចុប្បន្នភាពតួនាទីរបស់អ្នកគ្រប់គ្រងបានទេ", 'ព្រមាន')
                ->flash();
            return redirect()->route('setups.roles.index');
        }

        $helper = new GlobalHelper();

        $permActions = $role->rolePermissions()->select('action_id')->get()->toArray();

        $activeActions = [];
        foreach ($permActions as $act) {
            $activeActions[] = $act['action_id'];
        }

        $tree = "";
        $tree .= "<ul>";
        $tree .= $helper->permissionStructure($activeActions);
        $tree .= "</ul>";

        return view('setups::roles.edit')->with('tree', $tree)->with('role', $role);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'txtPermission' => ['required', 'min:2', 'unique:roles,name,'. $id],
            'txtPermissionKh' => ['required'],
            'txtDescription' => '',
        ]);
        $helper = new GlobalHelper();
        $actionsBy = $helper->getActionsBy();

        Roles::where("id", $id)
            ->update([
            'name' => $request->txtPermission,
            'name_kh' => $request->txtPermissionKh,
            'description' => $request->txtDescription,
            'order' => '0',
            'slug' => Str::slug($request->txtPermission)
        ]);

        if ($request->has('ft_1')) {
            foreach ($request->ft_1 as $perm) {
                $perm = explode("_", $perm);
                $action_id = $perm[1];
                switch ($perm[0]) {
                    case 'module':
                        if (isset($actionsBy['module_actions'][$perm[1]])) {
                            foreach ($actionsBy['module_actions'][$perm[1]] as $action_item) {
                                $permData[] = [
                                    "roles_id" => $id,
                                    "action_id" => $action_item,
                                    "created_at" => date("Y-m-d H:i:s")
                                ];
                            }
                        }
                        break;
                    case 'page':
                        if (isset($actionsBy['page_actions'][$perm[1]])) {
                            foreach ($actionsBy['page_actions'][$perm[1]] as $action_item) {
                                $permData[] = [
                                    "roles_id" => $id,
                                    "action_id" => $action_item,
                                    "created_at" => date("Y-m-d H:i:s")
                                ];
                            }
                        }
                        break;
                    case 'action':
                        $permData[] = [
                            "roles_id" => $id,
                            "action_id" => $action_id,
                            "created_at" => date("Y-m-d H:i:s")
                        ];
                        break;

                    default:
                        flash()
                            ->translate('kh')
                            ->option('timeout', 2000)
                            ->error("ការបង្កើតបរាជ័យ", 'បញ្ហា')
                            ->flash();
                        return redirect()->route('setups.roles.index');
                        break;

                }
            }

            $modRolePermission = new RolePermissions();
            $modRolePermission->where('roles_id', $id)->delete();
            $modRolePermission->insert($permData);
        }

        flash()
            ->translate('kh')
            ->option('timeout', 2000)
            ->success('success_msg', 'success')
            ->flash();
        return redirect()->route('setups.roles.index');
    }

    public function destroy($id) {
        $role = Roles::find($id);
        if ($role->id == 2) {
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error("អ្នកមិនអាចធ្វើបច្ចុប្បន្នភាពតួនាទីរបស់អ្នកគ្រប់គ្រងបានទេ", 'ព្រមាន')
                ->flash();
            return redirect()->route('setups.roles.index');
        }
        Roles::where("id", $id)->delete();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->error('delete_msg', 'delete')
            ->flash();
        return redirect()->route('setups.roles.index');
    }

    public function restore($id) {
        $role = Roles::find($id);
        if ($role->id == 2) {
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error("អ្នកមិនអាចធ្វើបច្ចុប្បន្នភាពតួនាទីរបស់អ្នកគ្រប់គ្រងបានទេ", 'ព្រមាន')
                ->flash();
            return redirect()->route('setups.roles.index');
        }
        Roles::where("id", $id)->withTrashed()->restore();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->success('restore_msg', 'restore')
            ->flash();
        return redirect()->route('setups.roles.index');
    }
}
