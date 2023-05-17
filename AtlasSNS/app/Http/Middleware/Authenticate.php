<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // 2023.05.17
            // return route('login');のloginと
            // web.phpのRoute::get('/login', 'Auth\LoginController@login')->name('login');の
            // ->name('login');のloginを同じにすることでlogin画面にリダイレクトする
            return route('login');
            // return redirect('login');
        }
    }
}
