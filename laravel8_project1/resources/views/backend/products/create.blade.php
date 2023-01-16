@extends('backend/layouts/app')

@section('content')
  <div class="nk-content-body">

    <div class="nk-block-head">
      <div class="nk-block-head-content">
        <h3 class="nk-block-title">New Product</h3>
        <div class="nk-block-des">
          <p>Add information and add new product.</p>
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
          <form id="product_form" action="{{ url('products') }}" method="post" enctype="multipart/form-data">
            <div class="row g-3">
              @csrf
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="product-title">Product Title</label>
                  <div class="form-control-wrap">
                    <input type="text" name="product_name" class="form-control" id="product-title"
                      value="{{ old('product_name') }}" placeholder="Enter Product Name">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label" for="default-textarea">Product Details</label>
                  <div class="form-control-wrap">
                    <textarea class="form-control no-resize" name="product_details" id="default-textarea"
                      placeholder="Enter Product Details">{{ old('product_details') }}</textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label" for="price">Price</label>
                  <div class="form-control-wrap">
                    <input type="number" name="product_price" class="form-control" id="price"
                      value="{{ old('product_price') }}" placeholder="Product Price">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label" for="stock">Stock</label>
                  <div class="form-control-wrap">
                    <input type="number" name="product_stock" class="form-control" id="stock"
                      value="{{ old('product_stock') }}" placeholder="Product Stock">
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
                            {{ old('product_category') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="upload-zone small bg-lighter my-2">
                  <div class="dz-message">
                    <span class="dz-message-text">Drag and drop file</span>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
                    New</span></button>
              </div>
            </div>
          </form>
        </div><!-- .nk-block -->
      </div>
    </div>

  </div>
@endsection
