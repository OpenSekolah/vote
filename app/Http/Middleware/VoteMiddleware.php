<?php

namespace App\Http\Middleware;

use Closure;

class VoteMiddleware
{

    public function handle($request, Closure $next, ... $permission)
    {
        // $request->session()->forget(['token_login', 'wrong_count']);
		$permissions = is_array($permission)
		? $permission
		: explode('|', $permission);
        
        if(in_array('page', $permissions) && $request->session()->exists('token_login')){
            
            $data = $request->session()->get('token_login');
            return redirect()->route('home.voting.create', ['vote' => $data['id']]);
        }

        if(in_array('submit', $permissions) && $request->session()->exists('wrong_count')){
            $wrong = (int) $request->session()->get('wrong_count');
            if($wrong > 5) {
                return redirect()->route('home.welcome')->with('warnings', "You have been blocked, the Token is incorrect {$wrong}x");
            }            
        } 
        
        if(in_array('formprocess', $permissions) && !$request->session()->exists('token_login')) {
            return redirect()->route('home.welcome')->with('warnings', "Your session has expired");
        }
        
        return $next($request);
    }
}
