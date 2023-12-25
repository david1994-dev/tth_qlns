<?php

namespace App\Modules;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class ModuleRouterServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const NHANSU_INDEX = '/nhansu';
    public const UNG_VIEN_CREATE_FORM = '/tao_ung_vien';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $modules = array_map('basename', File::directories(base_path('app/Modules')));
        $this->routes(function () use ($modules) {
            foreach ($modules as $module) {
                Route::middleware('web')
                    ->prefix(strtolower($module))
                    ->group(base_path('app/Modules/'.$module.'/routes/web.php'));
            }
        });
    }
}
