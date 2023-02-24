<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cart_items = Cart::where('user_id', Auth::user()->id)->get();

    return response()->json($cart_items);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $product_id = $request->product_id;
    $user_id = Auth::user()->id;

    if (!$user_id) {
      return response()->json(['error_login' => true, 'success' => false, 'msg' => 'Please login to continue']);
    }

    $product = Product::findOrFail($product_id);

    $productFoundInCart = Cart::where('product_id', $product_id)->where('user_id', $user_id)->first();

    if (!$productFoundInCart) {
      // Add product to cart
      Cart::insert([
        'product_id' => $product_id,
        'quantity' => 1,
        'price' => $product->product_price,
        'user_id' => $user_id,
        'create_at' => date("Y-m-d H:i:s")
      ]);
    } else {
      // Increse product quantity in cart
      $productFoundInCart->increment('quantity');
    }

    return response()->json(['success' => true, 'msg' => 'Product Added to Cart']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
