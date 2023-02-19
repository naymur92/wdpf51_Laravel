@extends('layouts.app')

@section('title', 'About Page')

@push('styles')
  <link rel="stylesheet" href="aboutstyle.css">
@endpush

@section('content')
  <h1>About Page</h1>
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero incidunt, voluptates minima, officiis totam tempore,
    sed unde nihil veritatis delectus nisi molestiae sunt dicta fuga? Enim hic voluptate assumenda error.</p>
@endsection
{{-- @show --}}

@push('scripts')
  {{-- <script src="myscripts.js"></script> --}}
@endpush
