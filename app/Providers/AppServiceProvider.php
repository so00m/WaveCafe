<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;


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
    public function boot()
    {
        // مشاركة البيانات عبر جميع الفيوهات
        View::composer('*', function ($view) {

            if (Auth::check()) {
                $user = Auth::user();
                
               
                $notifications = Notification::where('is_read', 0)
                    ->get();
                
               
                $unreadNotificationsCount = Notification::where('is_read', 0)
                    ->count();

                
                $view->with('notifications', $notifications)
                     ->with('unreadNotificationsCount', $unreadNotificationsCount);
            }
        });
        
    }






}
