<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Authentication</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('logo.png') }}">
    <link href="{{ asset('yash/yashadmin.dexignzone.com/xhtml') }}/css/style.css" rel="stylesheet">

    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="vh-100" style="background-image:url('{{ asset('yash/yashadmin.dexignzone.com/xhtml') }}/images/bg.png'); background-position:center;>
    <div class="authincation h-100">

        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="javascript:void(0);"><img src="{{ asset('logo.png') }}" style="width:70px"></a>
									</div>

                                    <h4 class="text-center mb-4">Login untuk masuk ke halaman Dashboard</h4>
                                    @include('notif.index')
                                    @include('notif.info')
                                    <form action="{{ route('login.post') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Kembali ke <a class="text-primary" href="/">Beranda</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('yash/yashadmin.dexignzone.com/xhtml') }}/vendor/global/global.min.js"></script>
<script src="{{ asset('yash/yashadmin.dexignzone.com/xhtml') }}/js/custom.js"></script>
<script src="{{ asset('yash/yashadmin.dexignzone.com/xhtml') }}/js/deznav-init.js"></script>
</body>

</html>
