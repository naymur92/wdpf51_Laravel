<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Product::orderBy('created_at', 'desc')->take(5)->get();
    return $products;
  }
  /**

   * Store a newly created resource in storage.

   *

   * @param  \Illuminate\Http\Request  $request

   * @return \Illuminate\Http\Response

   */
  public function store(Request $request)
  {
    $request->validate([
      'product_name' => 'required|min:3',
      'product_details' => 'min:5',
      'product_price' => 'required|numeric',
      'product_stock' => 'required|numeric',
      'product_category' => 'required',
    ]);

    return Product::create($request->only(['product_name', 'product_details', 'product_price', 'product_stock', 'product_category']));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $product = Product::findOrFail($id);
    return $product;
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $request->validate([
      'product_name' => 'min:3',
      'product_details' => 'min:5',
      'product_price' => 'numeric',
      'product_stock' => 'numeric',
    ]);

    $product->update($request->only(['product_name', 'product_details', 'product_price', 'product_stock', 'product_category']));

    return $product;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $product->delete();
    return response()->json(['message' => 'Product deleted successfully.']);
  }
}
