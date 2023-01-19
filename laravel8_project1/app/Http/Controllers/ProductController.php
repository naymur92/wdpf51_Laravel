<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    $categories = Category::get();
    $products = Product::latest()->paginate(10);
    return view('backend.products.index', compact('categories', 'products'))->with('i', (request()->input('page', 1) - 1) * 10);;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function create()
  {
    $categories = Category::get();
    return view('backend.products.create', compact('categories'));
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
      'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $data['product_name'] = request('product_name');
    $data['product_details'] = request('product_details');
    $data['product_price'] = request('product_price');
    $data['product_stock'] = request('product_stock');
    $data['product_category'] = request('product_category');

    if ($image = $request->file('product_image')) {
      $fileName = time() . '.' . $image->extension();
      $image->move(public_path('assets/images/products'), $fileName);
      $data['product_image'] = $fileName;
    } else {
      $data['product_image'] = 'no_image.jpg';
    }

    $data['created_at'] = date('Y-m-d H:i:s');

    // // print_r($request->all());

    if (Product::insert($data)) {
      return redirect('products')->with('msg', 'Product Added');
      // echo "Successfully Added";
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    return view('backend.products.single', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    //
  }
}
