<?php

namespace App\Http\View\Composers;


use App\user;
use App\Task;
use App\Comment;
use App\Listtask;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory;


class ProfileComposer extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // Using class based composers...
        // View::composer(
        //     'index', 'App\Http\View\Composers\ProfileComposer',
            
        // );
        View::composer('index', function ($view) {
            $CountUser = user::count();
            $CountTask = Task::count();
            $CountComment = Comment::count();
            $CountListtask = Listtask::count();
            $data = ['CountUser'=>$CountUser,
                    'CountTask'=>$CountTask,
                    'CountComment'=>$CountComment,
                    'CountListtask'=>$CountListtask];
            $view->with($data);
        });
    }
}