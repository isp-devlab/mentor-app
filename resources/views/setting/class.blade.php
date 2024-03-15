@extends('layouts.app')

@section('content')

<div class="container-xxl" id="kt_content_container">

  <div class="my-5">
    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
      <li class="nav-item">
          <a class="nav-link fs-4 fw-bold @if ($subTitle == 'Group') active text-dark @endif" href="{{ route('setting.group') }}">Group</a>
      </li>
      <li class="nav-item">
          <a class="nav-link fs-4 fw-bold  @if ($subTitle == 'Class') active text-dark @endif" href="{{ route('setting.class') }}">Class</a>
      </li>
    </ul>
  </div>

  <div class="row g-6 g-xl-9">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link fs-5 my-2 active" id="v-pills-category-tab" data-bs-toggle="pill" data-bs-target="#v-pills-category" type="button" role="tab" aria-controls="v-pills-category" aria-selected="true">Category</button>
              <button class="nav-link fs-5 my-2" id="v-pills-class-tab" data-bs-toggle="pill" data-bs-target="#v-pills-class" type="button" role="tab" aria-controls="v-pills-class" aria-selected="false">Class</button>
            </div>
          </div>
          <div class="col-md-10 border-left border-2">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-category" role="tabpanel" aria-labelledby="v-pills-category-tab" tabindex="0">
  
              </div>
              <div class="tab-pane fade" id="v-pills-class" role="tabpanel" aria-labelledby="v-pills-class-tab" tabindex="0">
                <div class="d-md-flex justify-content-md-between border-0 py-6">
                  <form method="GET" action="{{ route('setting.class') }}" class="card-title">
                    <input type="hidden" name="page" value="{{ request('page', 1) }}">
                    <div class="d-flex align-items-center position-relative my-1">
                      <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                          <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                      </span>
                      <input type="text"  class="form-control form-control-solid w-250px ps-14" name="q" value="{{ request('q') }}" placeholder="Search Class" />
                    </div>
                    <!--end::Search-->
                  </form>
                  <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                        <span class="svg-icon svg-icon-2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                          </svg>
                        </span>
                        Add Class
                      </button>
                    </div>
                    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">
                          <div class="modal-header" id="kt_modal_add_user_header">
                            <h2 class="fw-bolder">Add New Group</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                              <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                  <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                  <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                              </span>
                            </div>
                          </div>
                          <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <form  class="form" action="{{ route('setting.group.store') }}" method="POST">
                              @csrf
                              <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <div class="fv-row mb-7">
                                  <label class="required fw-bold fs-6 mb-2">Group Name</label>
                                  <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Group Name" required/>
                                </div>
                                <div class="fv-row mb-7">
                                  <label class="required fw-bold fs-6 mb-2">Description</label>
                                  <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0" required> </textarea>
                                </div>
                              </div>
                              <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"data-bs-dismiss="modal" aria-label="Close">Discard</button>
                                <button type="submit" class="btn btn-primary">
                                  Save
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="w-100 table-responsive">
                  <table class="table table-row-dashed fs-6 table-responsive w-100" id="kt_table_users">
                    <thead>
                      <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Class</th>
                        <th class="min-w-125px">Mentor</th>
                        <th class="min-w-125px">Member</th>
                        <th class="min-w-125px">Referral Code</th>
                        <th class="text-end min-w-100px">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($class as $item)  
                        <tr>
                          <td class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                              <span class="text-gray-800 mb-1">{{ $item->name }}</span>
                              <span>{{ $item->slug }}</span>
                            </div>
                          </td>
                          <td>
                            {{-- {{ dd() }} --}}
                            <div class="symbol-group symbol-hover mb-9">
                              <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                                <span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
                              </div>
                            </div>
                          </td>
                          <td>
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
                          </td>
                          <td>
                          </td>
                          <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                              <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                </svg>
                              </span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-3" data-kt-menu="true">
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">View</a>
                              </div>
                              <div class="menu-item px-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="menu-link px-3">Edit</a>
                              </div>
                              <div class="menu-item px-3">
                                <a href="#" id="{{ route('setting.group.destroy', $item->id) }}" class="menu-link btn-del px-3">Delete</a>
                              </div>
                            </div>
                          </td>
                        </tr>
          
                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered mw-650px">
                            <div class="modal-content">
                              <div class="modal-header" id="kt_modal_add_user_header">
                                <h2 class="fw-bolder">Edit Group</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                                  <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                      <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                      <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                  </span>
                                </div>
                              </div>
                              <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <form  class="form" action="{{ route('setting.group.update', $item->id) }}" method="POST">
                                  @csrf
                                  <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                    <div class="fv-row mb-7">
                                      <label class="required fw-bold fs-6 mb-2">Group Name</label>
                                      <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Group Name" value="{{ $item->name }}" required/>
                                    </div>
                                    <div class="fv-row mb-7">
                                      <label class="required fw-bold fs-6 mb-2">Description</label>
                                      <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0" required>{{ $item->slug }}</textarea>
                                    </div>
                                  </div>
                                  <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"data-bs-dismiss="modal" aria-label="Close">Discard</button>
                                    <button type="submit" class="btn btn-primary">
                                      Save
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex flex-stack flex-wrap mb-5">
                  <div class="fs-6 fw-semibold text-gray-700">
                    Showing {{ $class->firstItem() }} to {{ $class->lastItem() }} of {{ $class->total() }}  records
                  </div>
                    <ul class="pagination">
                      @if ($class->onFirstPage())
                          <li class="page-item previous">
                              <a href="#" class="page-link"><i class="previous"></i></a>
                          </li>
                      @else
                          <li class="page-item previous">
                              <a href="{{ $class->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
                          </li>
                      @endif
          
                      @foreach ($class->getUrlRange(1, $class->lastPage()) as $page => $url)
                          <li class="page-item{{ ($page == $class->currentPage()) ? ' active' : '' }}">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                          </li>
                      @endforeach
          
                      @if ($class->hasMorePages())
                          <li class="page-item next">
                              <a href="{{ $class->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
                          </li>
                      @else
                          <li class="page-item next">
                              <a href="#" class="page-link"><i class="next"></i></a>
                          </li>
                      @endif
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
@endsection