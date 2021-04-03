<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userInfo = login_user();
        if (empty($userInfo)) {
            //跳转到登录页
            return redirect('/login');
        }

        view()->share('userinfo', $userInfo);

        return $next($request);
    }
}
