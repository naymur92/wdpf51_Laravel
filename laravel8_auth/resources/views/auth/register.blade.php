@extends('layouts.app')

@section('title', 'Register Page')


@section('content')

  @include('includes.header')
  @include('includes.navbar')

  <div class="container mt-5">
    <div class="row justify-content-center">

      <div class="col-sm-6">
        <div class="card my-3">
          <div class="card-header">
            <h3 class="text-center">Registration Form</h3>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('register') }}">
              @csrf
              <!-- Name input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="_name">Enter Name</label>
                <input type="text" id="_name" value="{{ old('name') }}" name="name" class="form-control" />

                @error('name')
                  <div class="alert alert-warning mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input type="email" id="form2Example1" value="{{ old('email') }}" name="email"
                  class="form-control" />

                @error('email')
                  <div class="alert alert-warning mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="_pass">Enter Password</label>
                <input type="password" id="_pass" value="{{ old('password') }}" name="password"
                  class="form-control" />

                @error('password')
                  <div class="alert alert-warning mt-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="_conpass">Enter Password Again</label>
                <input type="password" id="_conpass" value="{{ old('password') }}" name="password_confirmation"
                  class="form-control" />

                @error('password_confirmation')
                  <div class="alert alert-warning mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
              <!-- Register buttons -->
              <div class="text-center">
                <p>Already a member? <a href="{{ url('login') }}">Login</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
