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
    // $products = Product::orderBy('created_at', 'desc')->take(5)->get();
    $products = Product::orderBy('created_at', 'desc')->get();
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
    // return $request->all();
    $request->validate([
      'product_name' => 'required|min:3',
      'product_details' => 'min:5',
      'product_price' => 'required|numeric',
      'product_stock' => 'required|numeric',
      'product_category' => 'required',
    ]);

    Product::create($request->only(['product_name', 'product_details', 'product_price', 'product_stock', 'product_category']));

    return response()->json(['success' => true, 'msg' => 'Product Added Successfully']);
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
  public function update(Request $request, $id)
  {
    $product = Product::findOrFail($id);
    $request->validate([
      'product_name' => 'required|min:3',
      'product_details' => 'min:5',
      'product_price' => 'required|numeric',
      'product_stock' => 'required|numeric',
      'product_category' => 'required',
    ]);

    $product->update($request->only(['product_name', 'product_details', 'product_price', 'product_stock', 'product_category']));

    return response()->json(['success' => true, 'msg' => 'Product Updated successfully.']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();
    return response()->json(['success' => true, 'msg' => 'Product deleted successfully.']);
  }
}
