<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <base href="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Aplans Boster merupakan singkatan dari Aplikasi Pelayanan Sosial Berbasis Online Terintegrasi. Aplans Boster merupakan program inovasi yang dibuat oleh Dinas Sosial Kota Medan dengan tujuan sebagai media dalam pengelolaan data dalam hal pelayanan kepada masyarakat." />
    <meta name="keywords" content="bansos, dansos, dinsos, dinas, sosial, bantuan, pemkomedan, medan, verifikasi, validasi, verivali" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Aplans Boster Verivali | {{ $title }}" />
    <meta property="og:url" content="{{ url('') }}" />
    <meta property="og:site_name" content="Aplans Boster Verivali" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/icon.png') }}" />

    @include('layouts._partials-app.head')

</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sigma-1/14.png">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="../../demo7/dist/index.html" class="mb-12">
                    <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
                </a>
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