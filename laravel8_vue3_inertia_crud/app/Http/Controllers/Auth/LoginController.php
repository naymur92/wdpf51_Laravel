<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return Inertia::render('Auth/Login');   // Vue component
  }
  public function authenticate(Request $request)
  {
  }
  public function logout(Request $request)
  {
  }
}
