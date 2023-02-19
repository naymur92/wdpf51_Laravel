<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class authAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->email;
        $pass = SHA1($request->password);

        $user = new User();
        $data = $user->where('email', $email);
        $data = $data->where('password', $pass);
        $data = $data->get()->toArray();

        if (empty($data)) {
            return redirect('/login')->with('msg', 'Please Check login credentials');
        }

        return $next($request);
    }
}
