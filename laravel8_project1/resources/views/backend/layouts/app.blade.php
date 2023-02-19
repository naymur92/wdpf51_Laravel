@include('backend/layouts/header')
<!-- content @s -->
<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      @yield('content')
    </div>
  </div>
</div>
<!-- content @e -->
@include('backend/layouts/footer')