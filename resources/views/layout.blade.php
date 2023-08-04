<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @if(Request::is('dashboard/*'))
        <link rel="stylesheet" href="{{ asset('dashboard-assets/dashboard.css') }}">
    @endif
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="/js/main.js"></script>
    @if(Request::is('dashboard/*'))
        <script src="{{ asset('dashboard-assets/dashboard.js') }}"></script>
    @endif

	<title>Document</title>
</head>

<body class="d-flex flex-column h-100">

        @if (auth()->user()?->user_role === 'superadmin' & Request::is('dashboard*'))
            @include('dashboard/nav')
        @else
            @include('nav')
        @endif


    @yield('content')

     @if (session()->has('success'))
        <div class="alert alert-success position-fixed  bottom-0 end-0  m-0 shadow rounded-0 border-top  border-success px-5 py-2 animate__animated animate__fadeInUpBig w-100 text-center" role="alert">
            <i class="fa fa-check" aria-hidden="true"></i> {{ session('success') }}
        </div>
    @endif

    {{-- <div class="toast-container position-absolute p-3 bottom-0 end-0 toast-element">
        <div class="toast show align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
                {{ session()->get('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
    </div> --}}
    @yield('scripts')
</body>

</html>
