<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('components.templates.HomeLayout', 'HomeLayout');
        Blade::component('components.templates.DashboardLayout', 'DashLayout');
        Blade::component('components.atoms.Scriptadm', 'Scriptadm');
        Blade::component('components.atoms.Share', 'Share');
        Blade::component('components.molecules.Hero', 'Hero');
        Blade::component('components.molecules.Navbar', 'Navbar');
        Blade::component('components.molecules.Footer', 'Footer');
        Blade::component('components.molecules.Navbaradm', 'Navbaradm');
        Blade::component('components.molecules.Sidebaradm', 'Sidebaradm');
        Blade::component('components.molecules.Footeradm', 'Footeradm');
    }
}
