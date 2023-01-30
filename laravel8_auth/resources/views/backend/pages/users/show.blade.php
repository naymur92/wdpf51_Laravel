@extends('backend.layouts.app')

@section('title', $user['name'] . ' - Show')

@push('styles')
  <!-- Custom fonts for this template-->
  <link href="/backendassets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/backendassets/css/sb-admin-2.min.css" rel="stylesheet">
@endpush

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Single User</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3>{{ $user['name'] }} - Show</h3>
            <a href="{{ route('users.index') }}" class="btn btn-warning">Back</a>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <tr>
                <th>Name</th>
                <td>{{ $user['name'] }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $user['email'] }}</td>
              </tr>
              <tr>
                <th>Created At</th>
                <td>{{ date('d M, Y - H:i A', strtotime($user['created_at'])) }}</td>
              </tr>
            </table>
          </div>
          <div class="card-footer">
            <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-outline-primary"><i class="fa fa-pen"></i>
              Edit</a>
          </div>
        </div>
      </div>
    </div>


  </div>
@endsection

@push('scripts')
  <!-- Bootstrap core JavaScript-->
  <script src="/backendassets/vendor/jquery/jquery.min.js"></script>
  <script src="/backendassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/backendassets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/backendassets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/backendassets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/backendassets/js/demo/chart-area-demo.js"></script>
  <script src="/backendassets/js/demo/chart-pie-demo.js"></script>
@endpush
