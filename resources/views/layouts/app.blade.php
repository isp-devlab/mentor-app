<!DOCTYPE html>
<html>
<head>
    <title>Aplans Boster Mobile | {{ $title }}</title>
    <base href=""/>
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

<body id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
          @include('layouts._partials-app.sidebar')
				</div>

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            @include('layouts._partials-app.topbar')
					</div>
			
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            @yield('content')
					</div>

					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
		        @include('layouts._partials-app.footer')
					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
		</div>

  @include('layouts._partials-app.alert')

  @include('layouts._partials-app.foot')
  
  <!--begin::Vendors Javascript(used for this page only)-->
  @yield('script')

</body>
</html>