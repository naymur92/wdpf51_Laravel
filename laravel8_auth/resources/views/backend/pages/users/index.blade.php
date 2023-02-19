@extends('backend.layouts.app')

@section('title', 'User List')

@push('styles')
  <!-- Custom fonts for this template -->
  <link href="/backendassets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/backendassets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="/backendassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        <a href="{{ url('users/create') }}" class="btn btn-primary">Add User</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Start date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Start date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user['name'] }}</td>
                  <td>{{ $user['email'] }}</td>
                  <td>{{ date('d M, Y - H:i A', strtotime($user['created_at'])) }}</td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('users.show', $user['id']) }}"><i
                            class="fa fa-eye text-primary"></i> View</a>
                        <a class="dropdown-item" href="{{ route('users.edit', $user['id']) }}"><i
                            class="fa fa-pen text-warning"></i> Edit</a>
                        <a class="dropdown-item" href="{{ route('users.destroy', $user['id']) }}"><i
                            class="fa fa-trash text-danger"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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
  <script src="/backendassets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/backendassets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/backendassets/js/demo/datatables-demo.js"></script>
@endpush
