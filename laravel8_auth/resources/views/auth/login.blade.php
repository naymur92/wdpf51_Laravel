@extends('layouts.app')

@section('title', 'Login Page')


@section('content')

  @include('includes.header')
  @include('includes.navbar')

  <div class="container mt-5">
    <div class="row justify-content-center">

      <div class="col-sm-6">
        <div class="card my-3">
          <div class="card-header">
            <h3 class="text-center">Loign Form</h3>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('login') }}">
              @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input type="email" id="form2Example1" value="{{ old('email') }}" name="email"
                  class="form-control" />

                @error('email')
                  <div class="alert alert-warning">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" value="{{ old('password') }}" name="password"
                  class="form-control" />

                @error('password')
                  <div class="alert alert-warning">{{ $message }}</div>
                @enderror
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                  </div>
                </div>

                <div class="col">
                  <!-- Simple link -->
                  <a href="#!">Forgot password?</a>
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Not a member? <a href="{{ url('register') }}">Register</a></p>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('includes.footer')
@endsection
