<div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
  <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
    <a href="{{ route('dashboard') }}">
      <img alt="Logo" src="assets/media/logos/logo-demo7.svg" class="h-35px" />
    </a>
  </div>
  <div class="aside-nav d-flex flex-column align-items-center w-100 pt-5 pt-lg-0 my-lg-auto">
    <div class="hover-scroll-y mb-10">
      <ul class="nav flex-column">
        <li class="nav-item my-4" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Dashboard">
          <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light  @if ($page_id == 1) active @endif" href="{{ route('dashboard') }}">
            <span class="svg-icon svg-icon-2x">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
              </svg>
            </span>
          </a>
        </li>
        <li class="nav-item my-4" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Class">
          <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light" href="#kt_aside_nav_tab_menu">
            <span class="svg-icon svg-icon-2x">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
              </svg>
            </span>
          </a>
        </li>
        <li class="nav-item my-4" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Group">
          <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light @if ($page_id == 2) active @endif" href="{{ route('group') }}">
            <span class="svg-icon svg-icon-2x">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
              </svg>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="aside-footer d-flex flex-column align-items-center flex-column-auto mt-auto mt-lg-0" id="kt_aside_footer">
    <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
      <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="User profile">
        <img src="@if(Auth::user()->image) {{ Auth::user()->image }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ Auth::user()->name }} @endif" alt="image" />
      </div>
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
        <div class="menu-item px-3">
          <div class="menu-content d-flex align-items-center px-3">
            <div class="symbol symbol-50px me-5">
              <img alt="Logo" src="@if(Auth::user()->image) {{ Auth::user()->image }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ Auth::user()->name }} @endif" />
            </div>
            <div class="d-flex flex-column">
              <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }}</div>
              <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
            </div>
          </div>
        </div>
        <div class="separator my-2"></div>
        <div class="menu-item px-5">
          <a href="../../demo7/dist/account/overview.html" class="menu-link px-5">My Profile</a>
        </div>
        <div class="menu-item px-5">
          <a href="{{ route('logout') }}" class="menu-link px-5">
            <span class="menu-text">Sign Out</span>
          </a>
        </div>									
      </div>
    </div>
  </div>
</div>