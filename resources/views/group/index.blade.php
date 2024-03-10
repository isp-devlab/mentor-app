@extends('layouts.app')

@section('content')

<div class="container-xxl" id="kt_content_container">

  <div class="d-flex flex-wrap flex-stack my-5">
    <h2 class="fs-2 fw-bold my-2">My Group
    <span class="fs-6 text-gray-400 ms-1">(2)</span></h2>
  </div>

  <div class="row g-6 g-xl-9">
    @foreach ($group as $item) 
      <div class="col-lg-6 col-xxl-4">
        <div class="card h-100">
          <div class="card-body p-9">
            <div class="fs-1 fw-bolder">{{ $item->group->name }}</div>
            <div class="fs-5 text-gray-400 mb-7">{{ $item->description }}</div>
            <div class="symbol-group symbol-hover mb-9">
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                <span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
              </div>
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                <img alt="Pic" src="assets/media/avatars/150-12.jpg" />
              </div>
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michelle Swanston">
                <img alt="Pic" src="assets/media/avatars/150-13.jpg" />
              </div>
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Francis Mitcham">
                <img alt="Pic" src="assets/media/avatars/150-5.jpg" />
              </div>
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                <span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
              </div>
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                <img alt="Pic" src="assets/media/avatars/150-3.jpg" />
              </div>
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
                <span class="symbol-label bg-info text-inverse-info fw-bolder">P</span>
              </div>
              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                <img alt="Pic" src="assets/media/avatars/150-7.jpg" />
              </div>
              <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bolder">+42</span>
              </a>
            </div>
            <div class="d-flex">
              <a href="#" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">All Clients</a>
              <a href="#" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Invite New</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <!--end::Row-->
  <!--begin::Pagination-->
  <div class="d-flex flex-stack flex-wrap pt-10">
    <div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
    <!--begin::Pages-->
    <ul class="pagination">
      <li class="page-item previous">
        <a href="#" class="page-link">
          <i class="previous"></i>
        </a>
      </li>
      <li class="page-item active">
        <a href="#" class="page-link">1</a>
      </li>
      <li class="page-item">
        <a href="#" class="page-link">2</a>
      </li>
      <li class="page-item">
        <a href="#" class="page-link">3</a>
      </li>
      <li class="page-item">
        <a href="#" class="page-link">4</a>
      </li>
      <li class="page-item">
        <a href="#" class="page-link">5</a>
      </li>
      <li class="page-item">
        <a href="#" class="page-link">6</a>
      </li>
      <li class="page-item next">
        <a href="#" class="page-link">
          <i class="next"></i>
        </a>
      </li>
    </ul>
    <!--end::Pages-->
  </div>
</div>

@endsection