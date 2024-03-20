@extends('layouts.auth')

@section('content')

<form class="form w-100" method="POST" action="{{ route('forget.submit') }}">
  @csrf
  <div class="text-center mb-10">
      <h1 class="text-dark mb-3">Forget Password?</h1>
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
  <div class="text-center">
      <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
          <span class="indicator-label">Reset Password</span>
          <span class="indicator-progress">Please wait...
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
      </button>

      <a href="{{ route('login') }}" id="kt_sign_in_submit" class="btn btn-lg btn-light w-100 mb-5">
        <span class="indicator-label">Login</span>
    </a>
  </div>
</form>

@endsection