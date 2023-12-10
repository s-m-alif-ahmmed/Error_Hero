<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Subscribe;
use App\Models\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view){
            $view->with('categories', Category::all());
        });
        View::composer('*', function ($view){
            $view->with('tags', Tag::all());
        });
        View::composer('*', function ($view){
            $view->with('blogs', Blog::all());
        });

        View::composer('*', function ($view){
            $view->with('contacts', Contact::all());
        });

        $unRead_contacts = Contact::where('status', 'unRead')->get();
        $total_unRead_contacts = $unRead_contacts->count();

        // Share the variable with all views
        View::share('total_unRead_contacts', $total_unRead_contacts);

        View::composer('*', function ($view){
            $view->with('subscribes', Subscribe::all());
        });

        $unRead_subscribes = Subscribe::where('status', 'unRead')->get();
        $total_unRead_subscribes = $unRead_subscribes->count();

        // Share the variable with all views
        View::share('total_unRead_subscribes', $total_unRead_subscribes);

//        Schema::defaultStringLength(191);
//
//        // Check if the macro has not been added before
//        if (!Collection::hasMacro('customPaginate')) {
//            Collection::macro('customPaginate', function ($perPage = 15, $page = null, $options = []) {
//                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//
//                return new LengthAwarePaginator(
//                    $this->forPage($page, $perPage),
//                    $this->count(),
//                    $perPage,
//                    $page,
//                    $options
//                );
//            });
//        }

    }
}
