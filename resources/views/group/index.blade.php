@extends('layouts.app')

@section('content')

<div class="container-xxl" id="kt_content_container">

  <div class="d-flex flex-wrap flex-stack my-5">
    <h2 class="fs-2 fw-bold my-2">My Group
    <span class="fs-6 text-gray-400 ms-1">({{ $group->total() }})</span></h2>
  </div>

  <div class="row g-6 g-xl-9">
    @if ($group->total() == 0)
      <div class="col-12 text-center text-gray-500 fs-5">
        <span class="svg-icon svg-icon-dark svg-icon-5x mb-3"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Sad.svg-->
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <defs/>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24"/>
                  <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                  <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
              </g>
          </svg><!--end::Svg Icon-->
        </span>
        <span class="d-block pt-3">~ You don't have group ~</span>
      </div>
    @else 
      @foreach ($group as $item) 
        <div class="col-lg-6 col-xxl-4">
          <div class="card h-100">
            <div class="card-body p-9">
              <div class="fs-1 fw-bolder">{{ $item->group->name }}</div>
              <div class="fs-5 text-gray-400 mb-7">{{ $item->group->description }}</div>
              <div class="symbol-group symbol-hover mb-9">
                @php
                  $members = $item->group->member;
                @endphp

                @for ($i = 0; $i < min(5, count($members)); $i++)
                  @php
                    $member = $members[$i];
                  @endphp

                  <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $member->user->name }}">
                    @if($member->user->image)
                      <img src="{{ $member->user->image }}" alt="pic">
                    @else
                      <img src="https://ui-avatars.com/api/?background=random&name={{ $member->user->name }}" alt="pic">
                    @endif
                  </div>
                @endfor
                <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                  <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bolder">+{{ count($members) }}</span>
                </a>
              </div>
              <div class="d-flex">
                <a href="{{ route('group.discussion', $item->group->id) }}" class="btn btn-primary btn-sm me-3">Add Discussion</a>
                <a href="{{ route('group.assignment', $item->group->id) }}" class="btn btn-light btn-sm">Add Assignment</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
  <!--end::Row-->
  <!--begin::Pagination-->
  @if ($group->total() > 0)   
    <div class="d-flex flex-stack flex-wrap pt-10">
      Showing {{ $group->firstItem() }} to {{ $group->lastItem() }} of {{ $group->total() }}  records
      <!--begin::Pages-->
      <ul class="pagination">
        @if ($group->onFirstPage())
            <li class="page-item previous">
                <a href="#" class="page-link"><i class="previous"></i></a>
            </li>
        @else
            <li class="page-item previous">
                <a href="{{ $group->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
            </li>
        @endif

        @foreach ($group->getUrlRange(1, $group->lastPage()) as $page => $url)
            <li class="page-item{{ ($page == $group->currentPage()) ? ' active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        @if ($group->hasMorePages())
            <li class="page-item next">
                <a href="{{ $group->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
            </li>
        @else
            <li class="page-item next">
                <a href="#" class="page-link"><i class="next"></i></a>
            </li>
        @endif
      </ul>
      <!--end::Pages-->
    </div>
  @endif
</div>

@endsection