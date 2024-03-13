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
        <div class="d-flex align-items-center justify-content-between mb-9">
          <h2>Member</h2>
        </div>
        <div class="table-responsive">
          <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
              <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">Mentor</th>
                <th class="min-w-125px">Phone Number</th>
                <th class="min-w-125px">Joined At</th>
                <th class="text-end min-w-100px">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 fw-bold">
                @foreach ($member as $item)  
                <tr>
                  <td class="d-flex align-items-center">
                    <div class="symbol-group symbol-hover me-3">
                      <div class="symbol symbol-45px symbol-circle" data-bs-toggle="tooltip" title="{{ $item->user->name }}">
                        <img src="@if($item->user->image) {{ $item->user->image}} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $item->user->name }} @endif" alt="">
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <span class="text-gray-800 mb-1">{{ $item->user->name }}</span>
                      <span>{{ $item->user->email }}</span>
                    </div>
                  </td>
                  <td>
                    {{ $item->user->phone_number }}
                  </td>
                  <td>
                    {{ $item->created_at}}
                  </td>
                  <td class="text-end">
                    <a href="#" id="{{ route('group.member.destroy', ['id' => $group->id, 'idMember' => $item->id]) }}" class="btn btn-light btn-active-light-primary btn-sm btn-del">
                      <span class="svg-icon svg-icon-5 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <defs/>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                              <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1"/>
                              <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                          </g>
                      </svg>
                      </span>
                    </a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
<script>
  // Format options
const format = (item) => {
    if (!item.id) {
        return item.text;
    }

    var url = item.element.getAttribute('data-kt-select2-country');
    var img = $("<img>", {
        class: "rounded-circle me-2",
        width: 26,
        src: url
    });
    var span = $("<span>", {
        text: " " + item.text
    });
    span.prepend(img);
    return span;
}

// Init Select2 --- more info: https://select2.org/
$('#kt_docs_select2_country').select2({
    templateResult: function (item) {
        return format(item);
    }
});
</script>
@endsection