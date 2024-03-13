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
      <div class="card-body py-10">

      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
@endsection