<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    //Este servicio se configuro con el comando php artisan make:provider <nombre>
    public function boot(): void
    {
        //Indica que la vista nav cargara todas las categorias de la tabla categories
        View::composer('components.layouts.nav', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
