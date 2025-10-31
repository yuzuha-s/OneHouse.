<?php

namespace App\Providers;

use App\Models\Checklist;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $checkLists = Checklist::all();
        View::share('checkLists', $checkLists);
    }
}
