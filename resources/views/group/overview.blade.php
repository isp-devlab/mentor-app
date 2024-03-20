@extends('layouts.app')

@section('content')

<div class="container-xxl" id="kt_content_container">

  <div class="row g-6 g-xl-6">
    <div class="card bgi-no-repeat bgi-position-x-end bgi-size-cover"  style="background-size: auto 100%; background-image: url(https://preview.keenthemes.com/metronic8/demo4/assets/media/misc/taieri.svg)">
      <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
          <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
              <div class="d-flex flex-column">
                <div class="d-flex align-items-center mb-2">
                  <a href="#" class="text-gray-900 text-hover-primary fs-1 fw-bolder me-1">{{ $group->name }}</a>
                </div>
                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                  <span class="d-flex align-items-center text-gray-400 me-5 mb-2">
                    {{ $group->description }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex overflow-auto h-55px">
          <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
            <li class="nav-item">
              <a class="nav-link text-active-primary me-6 @if ($subTitle == 'Overview') active @endif" href="{{ route('group.overview', $group->id) }}">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-active-primary me-6 @if ($subTitle == 'Mentor') active @endif" href="{{ route('group.mentor', $group->id) }}">Mentor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-active-primary me-6 @if ($subTitle == 'Member') active @endif" href="{{ route('group.member', $group->id) }}">Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-active-primary me-6 @if ($subTitle == 'Discussion') active @endif" href="{{ route('group.discussion', $group->id) }}">Discussion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-active-primary me-6 @if ($subTitle == 'Assignment') active @endif" href="{{ route('group.assignment', $group->id) }}">Assignment</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    

    <div class="card">
      <!--begin::Body-->
      <div class="card-body py-10">
        <h2 class="mb-9">Referral Program</h2>
        <!--begin::Overview-->
        <div class="row mb-10">
          <div class="col-12">
            <h4 class="text-gray-800 mb-0">Your Referral Code</h4>
            <p class="fs-6 fw-bold text-gray-600 py-4 m-0">Extend a warm invitation to join our vibrant community by enrolling with a unique referral code, and connect with fellow members who share common interests and passions.</p>
            <div class="d-flex">
              <input type="password" class="form-control form-control-solid me-3 flex-grow-1" id="password_1"  value="{{ $group->referral_code }}" />
              <button id="kt_referral_program_link_copy_btn btn-icon" class="btn btn-light btn-active-light-primary fw-bolder flex-shrink-0" onclick="password_show_hide('1')">
                <i class="fas fa-eye" id="show_eye_1"></i>
                <i class="fas fa-eye-slash d-none" id="hide_eye_1"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
          <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="black" />
              <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="black" />
            </svg>
          </span>
          <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
            <div class="mb-3 mb-md-0 fw-bold">
              <h4 class="text-gray-900 fw-bolder">Reset Referral Code</h4>
              <div class="fs-6 text-gray-700 pe-7">Reset your referral group code</div>
            </div>
            <a href="{{ route('group.overview.reset', $group->id) }}" class="btn btn-primary px-6 align-self-center text-nowrap">Reset Code</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
<script>
  function password_show_hide(id) {
      var x = document.getElementById("password_" + id);
      var show_eye = document.getElementById("show_eye_" + id);
      var hide_eye = document.getElementById("hide_eye_" + id);
      hide_eye.classList.remove("d-none");
      
      if (x.type === "password") {
          x.type = "text";
          show_eye.style.display = "none";
          hide_eye.style.display = "block";
      } else {
          x.type = "password";
          show_eye.style.display = "block";
          hide_eye.style.display = "none";
      }
  }
</script>
@endsection