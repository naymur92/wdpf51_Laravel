<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RegisterController extends Controller
{
  public function showRegisterForm()
  {
    return Inertia::render('Auth/Register');
  }

  public function register(Request $request)
  {
  }
}
