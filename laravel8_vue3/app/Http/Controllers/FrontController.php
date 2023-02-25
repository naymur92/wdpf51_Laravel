<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
  public function index()
  {
    return view('front');
  }

  public function front_products()
  {
    return response()->json(Product::get());
  }

  public function check_auth()
  {
    return response()->json(Auth::user());
  }
}
