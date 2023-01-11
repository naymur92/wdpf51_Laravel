@extends('backend/layouts/app')

@section('content')
  <div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
      <div class="nk-block-between">
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
                {{-- <div class="nk-tb-col nk-tb-col-check">
                  <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="pid">
                    <label class="custom-control-label" for="pid"></label>
                  </div>
                </div> --}}
                <div class="nk-tb-col tb-col-sm text-center"><span class="lead-text">Name</span></div>
                <div class="nk-tb-col tb-col-md text-center"><span class="lead-text">Details</span></div>
                <div class="nk-tb-col tb-col-md text-center"><span class="lead-text">Price</span></div>
                <div class="nk-tb-col"><span class="lead-text">Stock</span></div>
                <div class="nk-tb-col tb-col-md text-center"><span class="lead-text">Category</span></div>
                <div class="nk-tb-col"><span class="lead-text">Action</span></div>
                {{-- <div class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1 my-n1">
                    <li class="me-n1">
                      <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit
                                  Selected</span></a></li>
                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove
                                  Selected</span></a></li>
                            <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update
                                  Stock</span></a></li>
                            <li><a href="#"><em class="icon ni ni-invest"></em><span>Update
                                  Price</span></a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div> --}}
              </div><!-- .nk-tb-item -->
              @foreach ($products as $product)
                <div class="nk-tb-item">
                  <div class="nk-tb-col nk-tb-col-check">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                      <input type="checkbox" class="custom-control-input" id="pid1">
                      <label class="custom-control-label" for="pid1"></label>
                    </div>
                  </div>
                  <div class="nk-tb-col tb-col-sm">
                    <span class="tb-product">
                      <img src="/assets/images/products/{{ $product->product_image }}" alt="" class="thumb">
                      <span class="title">{{ $product->product_name }}</span>
                    </span>
                  </div>
                  <div class="nk-tb-col tb-col-md">{{ Str::limit($product->product_details, 50, '...') }}</div>
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
                              <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit
                                    Product</span></a></li>
                              <li><a href="#"><em class="icon ni ni-eye"></em><span>View
                                    Product</span></a></li>
                              <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product
                                    Orders</span></a></li>
                              <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove
                                    Product</span></a></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div><!-- .nk-tb-item -->
              @endforeach;
            </div><!-- .nk-tb-list -->
          </div>
          <div class="card-inner">
            <div class="nk-block-between-md g-3">
              <div class="g">
                <ul class="pagination justify-content-center justify-content-md-start">
                  <li class="page-item"><a class="page-link" href="#"><em
                        class="icon ni ni-chevrons-left"></em></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                  <li class="page-item"><a class="page-link" href="#">6</a></li>
                  <li class="page-item"><a class="page-link" href="#">7</a></li>
                  <li class="page-item"><a class="page-link" href="#"><em
                        class="icon ni ni-chevrons-right"></em></a></li>
                </ul><!-- .pagination -->
              </div>
              <div class="g">
                <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                  <div>Page</div>
                  <div>
                    <select class="form-select js-select2" data-search="on" data-dropdown="xs center">
                      <option value="page-1">1</option>
                      <option value="page-2">2</option>
                      <option value="page-4">4</option>
                      <option value="page-5">5</option>
                      <option value="page-6">6</option>
                      <option value="page-7">7</option>
                      <option value="page-8">8</option>
                      <option value="page-9">9</option>
                      <option value="page-10">10</option>
                      <option value="page-11">11</option>
                      <option value="page-12">12</option>
                      <option value="page-13">13</option>
                      <option value="page-14">14</option>
                      <option value="page-15">15</option>
                      <option value="page-16">16</option>
                      <option value="page-17">17</option>
                      <option value="page-18">18</option>
                      <option value="page-19">19</option>
                      <option value="page-20">20</option>
                    </select>
                  </div>
                  <div>OF 102</div>
                </div>
              </div><!-- .pagination-goto -->
            </div><!-- .nk-block-between -->
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
        <form action="{{ url('products') }}" method="post" enctype="multipart/form-data">
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
                    <select class="form-control" id="_category">
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
              <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
            </div>
          </div>
        </form>
      </div><!-- .nk-block -->
    </div>
  </div>
@endsection
