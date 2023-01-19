@extends('backend/layouts/app')

@section('content')
  <div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
      <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
          <h3 class="nk-block-title page-title">Product Details</h3>
        </div>
        <div class="nk-block-head-content">
          <a href="{{ route('products.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
              class="icon ni ni-arrow-left"></em><span>Back</span></a>
          <a href="{{ route('products.index') }}"
            class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
              class="icon ni ni-arrow-left"></em></a>
        </div>
      </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
      <div class="card">
        <div class="card-inner">
          <div class="row pb-5">
            <div class="col-lg-6">
              <div class="product-gallery me-xl-1 me-xxl-5">
                <img src="/assets/images/products/{{ $product->product_image }}" class="rounded w-100" alt="">
              </div><!-- .product-gallery -->
            </div><!-- .col -->
            <div class="col-lg-6">
              <div class="product-info mt-5 me-xxl-5">
                <h4 class="product-price text-primary">Tk. {{ $product->product_price }}</h4>
                <h2 class="product-title">{{ $product->product_name }}</h2>

                <div class="product-excrept text-soft">
                  {{ Str::limit($product->product_details, 50, '...') }}
                </div>
              </div><!-- .product-info -->
            </div><!-- .col -->
          </div><!-- .row -->
          <hr class="hr border-light">
          <div class="row g-gs flex-lg-row-reverse pt-5">
            <div class="col-lg-12">
              <div class="product-details entry me-xxl-3">
                <h3 class="mb-2">Product details of {{ $product->product_name }}</h3>
                {{ $product->product_details }}
              </div>
            </div><!-- .col -->
          </div><!-- .row -->
        </div>
      </div>
    </div><!-- .nk-block -->
  </div>
@endsection
