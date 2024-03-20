@extends('layouts.auth')

@section('content')

<form class="form w-100" method="POST" action="{{ route('reset.submit', $token) }}">
  @csrf
  <div class="text-center mb-10">
      <h1 class="text-dark mb-3">Reset Password</h1>
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
    <div class="alert alert-dismissible bg-light-dark border border-dashed border-dark border-3 d-flex align-items-center flex-column flex-sm-row">
      <div class="symbol-label">
        <div class="symbol symbol-circle symbol-60px overflow-hidden me-5">
            <div class="symbol-label">
              <img src="@if($user->image) {{ $user->image }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $user->name }} @endif" alt="{{ $user->name }}" class="w-100">
            </div>
        </div>
      </div>
      <div class="d-flex flex-column pe-0 pe-sm-10">
          <h4 class="mb-1">{{ $user->name }}</h4>
          <span class="text-muted">{{ $user->email }}</span>
      </div>
    </div>
  </div>
  <input type="hidden" value="{{$user->email}}" name="email">
  <div class="fv-row mb-5">
    <label class="form-label text-dark fs-6">New Password</label>
    <input class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="******" type="password" name="password" autocomplete="off" />
    @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="text-center">
      <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
          <span class="indicator-label">Change Password</span>
          <span class="indicator-progress">Please wait...
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
      </button>

      <a href="{{ route('login') }}" id="kt_sign_in_submit" class="btn btn-lg btn-light w-100 mb-5">
        <span class="indicator-label">Back</span>
    </a>
  </div>
</form>

@endsection