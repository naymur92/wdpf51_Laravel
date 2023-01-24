@extends('layouts.app')
@push('scripts')
  <!-- push something to the bottom of the stack -->
  <script src="jobs.js"></script>
@endpush

@push('styles')
  <link rel="stylesheet" href="jobs.css">
@endpush
