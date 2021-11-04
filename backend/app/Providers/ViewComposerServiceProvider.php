<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
          View::composer(
            [
                'layouts.app',
                'list',
                'staff.*'
            ],
            'App\Http\Composers\SidebarComposer',
            // [
            //     '/'
            // ],
            // 'App\Http\Composers\ToplistComposer',
        );

        // View::composers([
        //     App\Http\Composers\SidebarComposer::class =>
        //     [
        //         'layouts.app',
        //         'list',
        //         'edit',
        //         'memo'
        //     ],
        //     App\Http\Composers\ToplistComposer::class => '*',
        // ]);
    }

        // View::composer(
        //     'App\Http\Composers\TimeComposer' => ['dashboard.home', 'dashboard.account'],
        //     'App\Http\Composers\AuthViewComposer' => 'dashboard.*'
        // //
    // }
}
