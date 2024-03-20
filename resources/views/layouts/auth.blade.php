<!DOCTYPE html>
<html>

<head>
    <title>ISP | {{ $title }}</title>
    <base href="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Learning Management System Informatic Study Platform" />
    <meta name="keywords" content="unimal, isp, malikussaleh, infomatika, study, platforms, lms, learning" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Informatics Study Platform | {{ $title }}" />
    <meta property="og:url" content="{{ url('') }}" />
    <meta property="og:site_name" content="Informatics Study Platform" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logo-small.png') }}" />

    @include('layouts._partials-app.head')

</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('assets/media/14.png') }}">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/media/logo.png') }}" class="h-md-60px h-50px" />
                </div>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    
                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    @include('layouts._partials-app.foot')
    @yield('script')
    </body>

</html>