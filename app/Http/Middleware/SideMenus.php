<?php

namespace App\Http\Middleware;

use App\Helpers\GlobalHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
class SideMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->method() == 'POST') {
            return $next($request);
        }

        $helper = new GlobalHelper();
        $sideMenu = $helper->sideMenus();
        if (!$helper->hasPageAccess()) {
            return redirect()->back();
        }
        $data = [
            'sideMenus' => $sideMenu,
            'pageActions' => (isset($sideMenu['active_page_actions'])) ? $sideMenu['active_page_actions'] : null,
        ];
        View::share($data);
        return $next($request);
    }
}
