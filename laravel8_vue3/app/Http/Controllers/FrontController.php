<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
