<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Facades\Module;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('menu', function ($app) {
            return new Menu($this->loadMenus());
        });
    }

    /**
     * Bootstrap services.
     */
    protected function loadMenus(): array
    {
        $menus = [];

        $modules = Module::toCollection()->filter(function ($module) {
            return $module->isEnabled();
        });
        foreach ($modules as $module) {
            $menuFile = $module->getPath() . '/config/menu.php';
            if (File::exists($menuFile)) {
                $moduleMenu = File::getRequire($menuFile);
                if (is_array($moduleMenu)) {
                    $menus = array_merge($menus, $moduleMenu);
                }
            }
        }

        return $menus;
    }
}
