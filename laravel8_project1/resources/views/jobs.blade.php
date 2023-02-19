@extends('layouts.app')
@push('scripts')
  <!-- push something to the bottom of the stack -->
  <script src="jobs.js"></script>
@endpush

@section('sidebar')
  @parent

  <p>This is appended to the app sidebar.</p>
@endsection

@push('styles')
  <link rel="stylesheet" href="jobs.css">
@endpush
