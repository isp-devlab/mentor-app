@extends('layouts.app')

@section('content')

<div class="container-xxl" id="kt_content_container">

  <div class="d-flex flex-wrap flex-stack my-5">
    <h2 class="fs-2 fw-bold my-2">My Group
    <span class="fs-6 text-gray-400 ms-1">({{ $group->total() }})</span></h2>
  </div>

  <div class="row g-6 g-xl-9">
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
  </div>
  <!--end::Row-->
  <!--begin::Pagination-->
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
</div>

@endsection