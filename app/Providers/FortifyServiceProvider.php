<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                return redirect("/dashboard");
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request) {
            $username = (string) $request->username;
            return Limit::perMinute(5)->by($username.$request->ip());
        });

        Fortify::authenticateUsing(function (Request $request) {

            /*$user = User::leftJoin("staffs_models", "staffs_models.id", "=", "users.staff_id")
                ->get(["users.*", "staffs_models.name", "staffs_models.phone"])
                ->where('username', $request->username)->where("status", 1)->first();
            */

            $user = User::where('username', $request->username)
                        ->where('status', true)
                        ->first();
            if ($user && Hash::check($request->password, $user->password)) {
                Cache::forget('sidebar_actions_'.$user->id);
                Artisan::call('optimize:clear');
                session([
                    "is_admin" => $user->role_id,
                ]);
                return $user;
            }
            return null;
        });
    }
}
