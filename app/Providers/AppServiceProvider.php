<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //     $newMessagesCount = Message::where('to_user_id', Auth::id())->where('is_read', false)->count();

    // view()->share('newMessagesCount', $newMessagesCount);
    view()->composer('*', function ($view) {
        $newMessagesCount = 0;
        
        if (Auth::check()) {
            $newMessagesCount = Message::where('to_user_id', Auth::id())
                ->where('is_read', false)
                ->count();
        }
        
        $view->with('newMessagesCount', $newMessagesCount);
    });
    }
}