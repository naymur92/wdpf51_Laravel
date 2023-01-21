@extends('backend/layouts/app')

@section('content')
  <div class="nk-content-body">

    <div class="nk-block-head">
      <div class="nk-block-head-content">
        <h3 class="nk-block-title">Product Edit Form</h3>
        <div class="nk-block-des">
        </div>
      </div>
    </div><!-- .nk-block-head -->
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="nk-block">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form id="product_form" action="{{ route('products.update', $product->id) }}" method="post"
            enctype="multipart/form-data">
            <div class="row g-3">
              @csrf
              {{ method_field('PUT') }}
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="product-title">Product Title</label>
                  <div class="form-control-wrap">
                    <input type="text" name="product_name" class="form-control" id="product-title"
                      value="{{ old('product_name') ? old('product_name') : $product->product_name }}"
                      placeholder="Enter Product Name">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="default-textarea">Product Details</label>
                  <div class="form-control-wrap">
                    <textarea class="form-control no-resize" name="product_details" id="default-textarea"
                      placeholder="Enter Product Details">{{ old('product_details') ? old('product_details') : $product->product_details }}</textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label" for="price">Price</label>
                  <div class="form-control-wrap">
                    <input type="number" name="product_price" class="form-control" id="price"
                      value="{{ old('product_price') ? old('product_price') : $product->product_price }}"
                      placeholder="Product Price">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label" for="stock">Stock</label>
                  <div class="form-control-wrap">
                    <input type="number" name="product_stock" class="form-control" id="stock"
                      value="{{ old('product_stock') ? old('product_stock') : $product->product_stock }}"
                      placeholder="Product Stock">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="_category">Product Category</label>
                  <div class="form-control-wrap ">
                    <div class="form-control-select">
                      <select class="form-control" name="product_category" id="_category">
                        <option value="" selected hidden>Select One</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                            {{ old('product_category') ? (old('product_category') == $category->id ? 'selected' : '') : ($product->product_category == $category->id ? 'selected' : '') }}>
                            {{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="default-06">Product List</label>
                  <div class="form-control-wrap">
                    <div class="form-file">
                      <input type="file" name="product_image" class="form-file-input" id="customFile"
                        onchange="readURL(this)">
                      <label class="form-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>

                <!-- Show selected photo -->
                <img src="/assets/images/products/{{ $product->product_image }}" id="showSelectedPhoto"
                  class="img-thumbnail mt-2" width="150px" alt="selected image">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Update
                    Product</span></button>
              </div>
            </div>
          </form>
        </div><!-- .nk-block -->
      </div>
    </div>

  </div>
@endsection
