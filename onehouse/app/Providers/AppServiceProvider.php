<?php

namespace App\Providers;

use App\Models\Checklist;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    // チェックリストをすべてのビューで表示する
    public function boot(): void
    {
        // if (config('app.force_https', false)) {
        //     URL::forceScheme('https');
        // }
        if (Schema::hasTable('checklists')) {
            $checkLists = Checklist::all();
            View::share('checkLists', $checkLists);
        }
    }
}
