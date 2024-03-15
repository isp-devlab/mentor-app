@extends('layouts.app')

@section('content')

<div class="container-xxl" id="kt_content_container">

  <div class="my-5">
    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
      <li class="nav-item">
          <a class="nav-link fs-4 fw-bold  @if ($subTitle == 'Mentor') active text-dark @endif" href="{{ route('user-management.mentor') }}">Mentor</a>
      </li>
      <li class="nav-item">
          <a class="nav-link fs-4 fw-bold @if ($subTitle == 'User') active text-dark @endif" href="{{ route('user-management.user') }}">User</a>
      </li>
    </ul>
  </div>

  <div class="row g-6 g-xl-9">
    <div class="card">
      <div class="card-header border-0 py-6 d-flex align-content-center">
        <h2 class="fw-bold card-title">Mentor</h2>
        <form method="GET" action="{{ route('user-management.mentor') }}">
          <input type="hidden" name="page" value="{{ request('page', 1) }}">
          <div class="d-flex align-items-center position-relative my-1">
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
              </svg>
            </span>
            <input type="text"  class="form-control form-control-solid w-250px ps-14" name="q" value="{{ request('q') }}" placeholder="Search Mentor" />
          </div>
        </form>
      </div>
      <div class="card-body pt-0 table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
          <thead>
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
              <th class="min-w-125px">Mentor</th>
              <th class="min-w-125px">Phone Number</th>
              <th class="min-w-125px">Role</th>
              <th class="min-w-125px">Created At</th>
              <th class="text-end min-w-100px">Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 fw-bold">
            @if ($mentor->total() == 0)
              <tr>
                <td colspan="5" class="text-center fs-6 text-gray-500">
                  ~ No data to show ~
                </td>
              </tr>
            @else 
            
              @foreach ($mentor as $item)  
                <tr>
                  <td class="d-flex align-items-center">
                    <div class="symbol-group symbol-hover me-3">
                      <div class="symbol symbol-40px symbol-circle" data-bs-toggle="tooltip" title="{{ $item->name }}">
                        @if($item->image)
                          <img src="{{ $item->image }}" alt="pic">
                        @else
                          <img src="https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $item->name }}" alt="pic">
                        @endif                    
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <span class="text-gray-800 mb-1">{{ $item->name }}
                        @if ( $item->is_active)
                        <span class="badge badge-secondary ms-3">Active</span>
                        @else
                        <span class="badge badge-light-danger ms-3">Non-Active</span>
                        @endif
                      </span>
                      <span>{{ $item->email }}</span>
                    </div>
                  </td>
                  <td>
                    <span>{{ $item->phone_number }}</span>
                  </td>
                  <td>
                    <span>{{ $item->role->name?? '' }}</span>
                  </td>
                  <td>
                    <span>{{ $item->created_at }}</span>
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
                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="menu-link px-3">Edit</a>
                      </div>
                      <div class="menu-item px-3">
                        <a href="#" id="{{ route('user-management.mentor.destroy', $item->id) }}" class="menu-link btn-del px-3">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>

                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                      <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bolder">Edit Mentor</h2>
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
                        <form  class="form" action="{{ route('user-management.mentor.update', $item->id) }}" method="POST">
                          @csrf
                          <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                              <label class="required fw-bold fs-6 mb-2">Status</label>
                              <select class="form-select form-select-solid" name="status" required>
                                <option value="true" @if ($item->is_active) selected  @endif>Active</option>
                                <option value="false" @if (!$item->is_active) selected  @endif>Non-Active</option>
                              </select>                            
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-bold fs-6 mb-2">Role</label>
                              <select class="form-select form-select-solid" name="roleId" required>
                                @foreach ($role as $roles)
                                  <option value="{{ $roles->id }}" @if ($roles->id == $item->role->id) selected  @endif>{{ $roles->name }}</option>
                                @endforeach
                              </select>                              
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
            @endif
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <div class="d-flex flex-stack flex-wrap">
          <div class="fs-6 fw-semibold text-gray-700">
            Showing {{ $mentor->firstItem() }} to {{ $mentor->lastItem() }} of {{ $mentor->total() }}  records
          </div>
            <ul class="pagination">
              @if ($mentor->onFirstPage())
                  <li class="page-item previous">
                      <a href="#" class="page-link"><i class="previous"></i></a>
                  </li>
              @else
                  <li class="page-item previous">
                      <a href="{{ $mentor->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
                  </li>
              @endif
  
              @foreach ($mentor->getUrlRange(1, $mentor->lastPage()) as $page => $url)
                  <li class="page-item{{ ($page == $mentor->currentPage()) ? ' active' : '' }}">
                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
              @endforeach
  
              @if ($mentor->hasMorePages())
                  <li class="page-item next">
                      <a href="{{ $mentor->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
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
@endsection

@section('script')
@endsection