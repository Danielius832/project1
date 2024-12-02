<?php
public function handle($request, Closure $next, $role)
{
    if (auth()->user()->role != $role) {
        return redirect('/');
    }

    return $next($request);
}