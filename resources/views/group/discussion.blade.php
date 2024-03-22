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

    <div class="d-flex align-items-center justify-content-between mt-10">
      <span class="fs-2 text-dark fw-bolder text-dark lh-base">Discussion</span>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disAdd">
        <span class="svg-icon svg-icon-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
          </svg>
        </span>
        Add Discussion
      </button>

      <div class="modal fade" id="disAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm mw-800px">
          <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
              <h2 class="fw-bolder">Add New Discussion</h2>
              <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                <span class="svg-icon svg-icon-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                  </svg>
                </span>
              </div>
            </div>
            <div class="modal-body scroll-y mx-2 mx-xl-5 my-3">
              <form  class="form" id="formAdd" action="{{ route('group.discussion.store', $group->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 mb-5">
                  <input type="text" class="form-control form-control-lg w-100" name="title" placeholder="Title" value="" required/>
                </div>
                <div class="col-lg-12 mb-5">
                  <textarea  id="editor" name="content" required>
                  </textarea>
                </div>
                {{-- <input type="file" name="aa"> --}}
                <div class="fv-row" onclick="document.getElementById('attachmentInput').click();">
                  <div class="dropzone" >
                    <div class="dz-message needsclick d-flex">
                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x me-3"></i>
                        <div>
                          <label for="attachmentInput" id="fileLabel" class="fs-5 fw-bolder text-gray-900">Attachment File (optional)</label>
                          <input type="file" name="attachment" id="attachmentInput" style="display: none;" onchange="document.getElementById('fileLabel').innerHTML = this.files.length > 0 ? this.files[0].name : 'Attachment File (optional)'">
                        </div>
                      </div>
                      <div class="d-flex">
                        <span class="fs-7 fw-bold text-gray-400 d-flex" style="margin-left: 50px !important; margin-top: -15px !important;">Click Here, Only jpg, png, docx, pdf, xlxs</span>
                      </div>
                  </div>
                </div>
                <div class="text-center pt-10">
                  <button type="reset" class="btn btn-light me-3"data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                  <button type="submit" id="submitButton" class="btn btn-primary" onclick="disableButton('formAdd')">
                    Add
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    @if ($discussion->total() == 0)
      <div class="col-12 text-center text-gray-500 fs-5 h-100 pt-15 mt-15">
        <span class="svg-icon svg-icon-dark svg-icon-5x mb-3"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Sad.svg-->
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <defs/>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24"/>
                  <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                  <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
              </g>
          </svg>
        </span>
        <span class="d-block pt-3">~ You don't have discussion ~</span>
      </div>
    @else
      @foreach ($discussion as $item)   
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
              <div class="mb-5">
                <div class="d-flex align-items-center justify-content-between">
                  <span class="fs-2 text-dark fw-bolder text-dark lh-base">{{ $item->title }}</span>
                  <div>
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                      <span class="svg-icon svg-icon-5 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <defs/>
                          <g stroke="none" stroke-width="1">
                              <rect x="14" y="9" width="6" height="6" rx="3" fill="black"/>
                          <rect x="3" y="9" width="6" height="6" rx="3" fill="black" fill-opacity="0.7"/>
                        </g>
                        </svg>
                      </span>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-3" data-kt-menu="true">
                      <div class="menu-item px-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="" class="menu-link px-3">Edit</a>
                      </div>
                      <div class="menu-item px-3">
                        <a href="#" id="{{ route('group.discussion.destroy', ['id' => $group->id, 'idDiscussion' => $item->id]) }}" class="menu-link btn-del px-3">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="fs-5 text-gray-600 mt-4">
                  {!! $item->content !!}
                </div>
                @if ($item->attach_file)
                  <div class="d-flex pb-5">
                    <div class="d-flex align-items-center border border-dashed border-gray-300 rounded p-5">
                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">  
                          <span class="svg-icon svg-icon-success svg-icon-3x me-3"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/File.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <defs/>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                          </span>
                          @php
                              $data = json_decode($item->attach_file, true);
                          @endphp
                            <div class="ms-1 fw-semibold">
                                <a href="{{ $data['path'] }}" target="_blank" class="fs-6 text-success fw-bold">{{ $data['file'] }}</a>
                                <div class="text-gray-500">{{ $data['size'] }}</div>
                            </div>
                        </div>
                    </div>
                  </div>
                @endif
              </div>
              <div class="d-flex flex-stack flex-wrap">
                <div class="symbol symbol-35px symbol-circle me-3">
                  <img alt="" src="@if($item->mentor->image) {{ $item->mentor->image }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $item->mentor->name }} @endif" />
                  <span class="text-gray-700 fs-5">{{ $item->mentor->name }}</span>
                </div>
                <div class="fs-5 fw-bolder">
                  <span class="text-muted">on {{ $item->created_at }}</span>
                </div>
              </div>
            </div>

            <div class="accordion mt-10" id="kt_accordion_1">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_3">
                        <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                        Response <span class="text-gray-500 fs-7 ms-2">({{ count($item->comment) }})</span>
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body">
                          @if (count($item->comment) == 0) 
                            <span>No response</span>
                          @else  
                          @foreach ($item->comment as $item)
                            <div class="d-flex justify-content-start mb-10">
                              <div class="d-flex flex-column align-items-start">
                                <div class="d-flex align-items-center mb-2">
                                  <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="@if($item->user->image) {{ $item->user->image }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $item->user->name }} @endif" />
                                  </div>
                                  <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">{{ $item->user->name }}</a>
                                    <span class="text-muted fs-7 mb-1">{{ $item->created_at }}</span>
                                  </div>
                                </div>
                                <div class="p-5 rounded bg-light-info text-dark fw-bold text-start" data-kt-element="message-text">{{ $item->content }}</div>
                              </div>
                            </div>
                          @endforeach
                          @endif
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
      @endforeach
    @endif
  </div>

   <!--begin::Pagination-->
   @if ($discussion->total() > 0)   
   <div class="d-flex flex-stack flex-wrap pt-10">
     Showing {{ $discussion->firstItem() }} to {{ $discussion->lastItem() }} of {{ $discussion->total() }}  records
     <!--begin::Pages-->
     <ul class="pagination">
       @if ($discussion->onFirstPage())
           <li class="page-item previous">
               <a href="#" class="page-link"><i class="previous"></i></a>
           </li>
       @else
           <li class="page-item previous">
               <a href="{{ $discussion->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
           </li>
       @endif

       @foreach ($discussion->getUrlRange(1, $discussion->lastPage()) as $page => $url)
           <li class="page-item{{ ($page == $discussion->currentPage()) ? ' active' : '' }}">
               <a class="page-link" href="{{ $url }}">{{ $page }}</a>
           </li>
       @endforeach

       @if ($discussion->hasMorePages())
           <li class="page-item next">
               <a href="{{ $discussion->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
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

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
  class MyUploadAdapter {
    constructor( loader ) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject, file );
                this._sendRequest( file );
            } ) );
    }

    abort() {
        if ( this.xhr ) {
            this.xhr.abort();
        }
    }

    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        xhr.open( 'POST', "{{route('upload', ['_token' => csrf_token() ])}}", true );
        xhr.responseType = 'json';
    }

    _initListeners( resolve, reject, file ) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${ file.name }.`;

        xhr.addEventListener( 'error', () => reject( genericErrorText ) );
        xhr.addEventListener( 'abort', () => reject() );
        xhr.addEventListener( 'load', () => {
            const response = xhr.response;

            if ( !response || response.error ) {
                return reject( response && response.error ? response.error.message : genericErrorText );
            }

            resolve( response );
        } );

        if ( xhr.upload ) {
            xhr.upload.addEventListener( 'progress', evt => {
                if ( evt.lengthComputable ) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            } );
        }
    }

    _sendRequest( file ) {
        const data = new FormData();

        data.append( 'upload', file );
        data.append( 'id',  '{{ $group->id }}');

        this.xhr.send( data );
    } 
  }

  function MyCustomUploadAdapterPlugin( editor ) {
      editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
          return new MyUploadAdapter( loader );
      };
  }

  ClassicEditor
    .create( document.querySelector( '#editor' ), {
        extraPlugins: [ MyCustomUploadAdapterPlugin ],
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection