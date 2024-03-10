@extends('layouts.auth')

@section('content')

<form class="form w-100" method="POST" action="{{ route('login.submit') }}">
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
  <div class="fv-row mb-10">
      <label class="form-label fs-6 text-dark">Email</label>
      <input class="form-control form-control-lg" placeholder="Email" type="text" name="email" autocomplete="off" />
  </div>
  <div class="fv-row mb-10">
      <div class="d-flex flex-stack mb-2">
          <label class="form-label text-dark fs-6 mb-0">Password</label>
          <a href="../../demo7/dist/authentication/flows/basic/password-reset.html" class="link-dark fs-6 fw-bolder">Forgot Password ?</a>
      </div>
      <input class="form-control form-control-lg" placeholder="******" type="password" name="password" autocomplete="off" />
  </div>
  <div class="text-center">
      <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
          <span class="indicator-label">Continue</span>
          <span class="indicator-progress">Please wait...
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
      </button>
  </div>
</form>

@endsection