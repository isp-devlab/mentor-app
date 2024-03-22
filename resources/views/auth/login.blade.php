@extends('layouts.auth')

@section('content')

<form class="form w-100" method="POST" id="login" action="{{ route('login.submit') }}">
  @csrf
  <div class="text-center mb-10">
      <h1 class="text-dark mb-3">Mentor Login</h1>
      <div class="text-gray-400 fs-5">Please enter your email and password</div>
  </div>
  @if (session()->has('warning'))
    <div class="alert alert-dismissible bg-warning d-flex align-items-center flex-column flex-sm-row p-5 mb-10">
      <div class="d-flex flex-column text-light pe-0">
          <h4 class="mb-2 text-light">Failed</h4>
          <span class="fw-bold">{{ session('warning') }}</span>
      </div>
    </div>
  @elseif (session()->has('error'))
    <div class="alert alert-dismissible bg-danger d-flex align-items-center flex-column flex-sm-row p-5 mb-10">
      <div class="d-flex flex-column text-light pe-0">
          <h4 class="mb-2 text-light">Failed</h4>
          <span class="fw-bold">{{ session('error') }}</span>
      </div>
    </div>
    @elseif (session()->has('success'))
    <div class="alert alert-dismissible bg-success d-flex align-items-center flex-column flex-sm-row p-5 mb-10">
      <div class="d-flex flex-column text-light pe-0">
        <h4 class="mb-2 text-light">Success</h4>
          <span class="fw-bold">{{ session('success') }}</span>
      </div>
    </div>
  @endif
  <div class="fv-row mb-5">
    <label class="form-label fs-6 text-dark">Email</label>
    <input class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" type="email" name="email" value="{{ old('email') }}" autocomplete="off" />
    @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="fv-row mb-5">
    <div class="d-flex flex-stack mb-2">
      <label class="form-label text-dark fs-6 mb-0">Password</label>
      <a href="{{ route('forget') }}" class="link-dark fs-6 fw-bolder">Forgot Password ?</a>
    </div>
    <input class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="******" type="password" name="password" autocomplete="off" />
    @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="text-center">
      <button type="button" id="submitButton" class="btn btn-primary btn-lg w-100 mb-5" onclick="disableButton('login')">
        Login
      </button>
      <a href="{{ route('register') }}" id="kt_sign_in_submit" class="btn btn-lg btn-light w-100 mb-5">
        <span class="indicator-label">Register</span>
    </a>
  </div>
</form>

@endsection