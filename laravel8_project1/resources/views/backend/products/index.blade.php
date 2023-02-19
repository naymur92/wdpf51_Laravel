@extends('backend/layouts/app')

@section('content')
  <div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
      <div class="nk-block-between">

        {{-- Display Error Message --}}
        @if (session()->has('msg'))
          <script>
            function tempAlert(msg, duration) {
              var el = document.createElement("div");
              el.setAttribute('class', 'alert alert-success');
              el.setAttribute("style", "position:absolute;top:10%;left:50%;width:250px;text-align:center");
              el.innerHTML = msg;
              setTimeout(function() {
                el.parentNode.removeChild(el);
              }, duration);
              document.body.appendChild(el);
            }

            tempAlert('{{ session()->get('msg') }}', 5000);
          </script>
        @endif


        <div class="nk-block-head-content">
          <h3 class="nk-block-title page-title">Products</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
          <div class="toggle-wrap nk-block-tools-toggle">
            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                class="icon ni ni-more-v"></em></a>
            <div class="toggle-expand-content" data-content="pageMenu">
              <ul class="nk-block-tools g-3">
                <li>
                  <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                      <em class="icon ni ni-search"></em>
                    </div>
                    <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                  </div>
                </li>
                <li>
                  <div class="drodown">
                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                      data-bs-toggle="dropdown">Status</a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <ul class="link-list-opt no-bdr">
                        <li><a href="#"><span>New Items</span></a></li>
                        <li><a href="#"><span>Featured</span></a></li>
                        <li><a href="#"><span>Out of Stock</span></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="nk-block-tools-opt">
                  <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em
                      class="icon ni ni-plus"></em></a>
                  <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em
                      class="icon ni ni-plus"></em><span>Add Product</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div><!-- .nk-block-head-content -->
      </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
      <div class="card">
        <div class="card-inner-group">
          <div class="card-inner p-0">
            <div class="nk-tb-list">
              <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col"></div>
                <div class="nk-tb-col tb-col-sm text-center"><span class="lead-text">Name</span></div>
                <div class="nk-tb-col tb-col-md text-center"><span class="lead-text">Details</span></div>
                <div class="nk-tb-col tb-col-md text-center"><span class="lead-text">Price</span></div>
                <div class="nk-tb-col"><span class="lead-text">Stock</span></div>
                <div class="nk-tb-col tb-col-md text-center"><span class="lead-text">Category</span></div>
                <div class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1 my-n1">
                    <li class="me-n1">
                      <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                            <li><a href="#" class="mult_pr_del"><em class="icon ni ni-trash"></em><span>Remove
                                  Selected</span></a></li>
                            <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                            <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div><!-- .nk-tb-item -->
              @foreach ($products as $product)
                <div class="nk-tb-item">
                  <div class="nk-tb-col nk-tb-col-check">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                      <input type="checkbox" class="custom-control-input" id="pid{{ $product['id'] }}"
                        value="{{ $product['id'] }}">
                      <label class="custom-control-label" for="pid{{ $product['id'] }}"></label>
                    </div>
                  </div>
                  <div class="nk-tb-col tb-col-sm">
                    <span class="tb-product">
                      <img src="/assets/images/products/{{ $product->product_image }}" alt="" class="thumb">
                      <span class="title">{{ $product->product_name }}</span>
                    </span>
                  </div>
                  <div class="nk-tb-col tb-col-md">{{ Str::limit($product->product_details, 50, '...') }}
                  </div>
                  <div class="nk-tb-col tb-col-md">
                    <span class="tb-lead">Tk. {{ $product->product_price }}</span>
                  </div>
                  <div class="nk-tb-col">
                    <span class="tb-lead text-center">{{ $product->product_stock }}</span>
                  </div>
                  <div class="nk-tb-col tb-col-md text-center">
                    <span class="tb-sub">
                      @foreach ($categories as $category)
                        @if ($category->id == $product->product_category)
                          {{ $category->category_name }}
                        @endif
                      @endforeach
                    </span>
                  </div>

                  <div class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-1 my-n1">
                      <li class="me-n1">
                        <div class="dropdown">
                          <a href="#" class="dropdown-toggle btn  btn-icon btn-trigger"
                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <ul class="link-list-opt no-bdr">
                              <li><a href="{{ route('products.edit', $product['id']) }}"><em
                                    class="icon ni ni-edit"></em><span>Edit
                                    Product</span></a></li>
                              <li><a href="{{ route('products.show', $product['id']) }}"><em
                                    class="icon ni ni-eye"></em><span>View
                                    Product</span></a></li>
                              <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product
                                    Orders</span></a></li>

                              {{-- This part is for jQuery ajax --}}
                              {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
                              <li><a href="{{ route('products.destroy', $product['id']) }}"
                                  onclick="return confirm('Are You Sure want to delete?')" class="pr_del"><em
                                    class="icon ni ni-trash"></em><span>Remove
                                    Product</span></a></li> --}}

                              {{-- This part is for form --}}
                              <li>
                                <form action="{{ route('products.destroy', $product['id']) }}"
                                  onsubmit="return confirm('Are You Sure want to delete?')" method="post"
                                  class="pr_del_form">
                                  {{ method_field('DELETE') }}
                                  @csrf
                                  <a href="#" class="pr_del_sub"><em class="icon ni ni-trash"></em><span>Remove
                                      Product</span></a>
                                </form>

                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div><!-- .nk-tb-item -->
              @endforeach
            </div><!-- .nk-tb-list -->
          </div>
          <div class="card-inner">
            {{-- Pagination --}}
            {{ $products->links('vendor.pagination.dashlite') }}
          </div>
        </div>
      </div>
    </div><!-- .nk-block -->
    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
      data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
      <div class="nk-block-head">
        <div class="nk-block-head-content">
          <h5 class="nk-block-title">New Product</h5>
          <div class="nk-block-des">
            <p>Add information and add new product.</p>
          </div>
        </div>
      </div><!-- .nk-block-head -->
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
                    placeholder="Enter Product Name">
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="default-textarea">Product Details</label>
                <div class="form-control-wrap">
                  <textarea class="form-control no-resize" name="product_details" id="default-textarea"
                    placeholder="Enter Product Details"></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="price">Price</label>
                <div class="form-control-wrap">
                  <input type="number" name="product_price" class="form-control" id="price"
                    placeholder="Product Price">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="stock">Stock</label>
                <div class="form-control-wrap">
                  <input type="text" name="product_stock" class="form-control" id="stock"
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
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
              <button type="button" id="product_submit_btn" class="btn btn-primary"><em
                  class="icon ni ni-plus"></em><span>Add New</span></button>
            </div>
          </div>
        </form>
      </div><!-- .nk-block -->
    </div>
  </div>
@endsection
