<!doctype html>
<html lang="en" dir="ltr">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content=''>
    <meta http-equiv="X-UA-Compatible" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- TITLE -->
    <title>Error Hero</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}backend/images/Error_Hero_Icon.png" />

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('/')}}backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('/')}}backend/css/style.css" rel="stylesheet" />
    <link href="{{asset('/')}}backend/css/skin-modes.css" rel="stylesheet" />



    <!--- FONT-ICONS CSS -->
    <link href="{{asset('/')}}backend/plugins/icons/icons.css" rel="stylesheet" />

    <!-- INTERNAL Switcher css -->
    <link href="{{asset('/')}}backend/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{asset('/')}}backend/switcher/demo.css" rel="stylesheet">

</head>


<body class="ltr login-img">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{asset('/')}}backend/images/loader.svg" class="loader-img" alt="Loader">
</div>

<div class="page">
    <div>
        <!-- CONTAINER OPEN -->
        <div class="col col-login mx-auto text-center">

        </div>
        <div class="container-login100">
            <div class="wrap-login100 p-0">
                <div class="card-body bg-white opacity-2">
                    <form action="{{ route('register') }}" method="POST" class="login100-form validate-form">
                        @csrf

                        <span class="login100-form-title">
                            <a href="index.html" class="text-center">
                                <img src="{{asset('/')}}backend/images/Error_Hero.png" class="header-brand-img" alt="" style="width: 175px;">
                            </a>
                        </span>

                        <div class="">
                            <div class="wrap-input100 validate-input" data-bs-validate = "Full Name is required">
                                <input class="input100 bg-black text-white" id="name" type="text" name="name" :value="old('name')" placeholder="Full Name" required autofocus autocomplete="name" />
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                <i class="zmdi zmdi-account" aria-hidden="true"></i>
                            </span>
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="my-2" />
                        </div>

                        <div class="">
                            <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                                <input class="input100 bg-black text-white" id="email" type="email" placeholder="Email" name="email" :value="old('email')" required autocomplete="username" />
                                <span class="focus-input100"></span>
                                <span class="symbol-input100 ">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </span>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="my-2" />
                        </div>

                        <div class="">
                            <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                                <input class="input100 bg-black text-white" id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                                <span class="focus-input100"></span>
                                <span class="symbol-input100 ">
                                <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                            </span>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="my-2" />
                        </div>

                        <div class="">
                            <div class="wrap-input100 validate-input" data-bs-validate = "Confirm Password is required">
                                <input class="input100 bg-black text-white" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                                <span class="focus-input100"></span>
                                <span class="symbol-input100 ">
                                <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                            </span>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="my-2" />
                        </div>

                        <div class="container-login100-form-btn">
                            <input class="login100-form-btn btn-white bg-black text-white" type="submit" value="Sign Up" />
                        </div>
                    </form>

                    <div class="d-flex justify-content-center">
                        <hr class="w-25 fw-bolder mx-2"/>
                        <p class="fw-bold mt-1">Or</p>
                        <hr class="w-25 fw-bolder mx-2"/>
                    </div>

                    <div class="text-center pt-2">
                        <p class="text-dark mb-0">Already a member?<a href="{{route('login')}}" class="text-primary ms-1"> Login Now </a></p>
                    </div>
                </div>

            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<!-- End PAGE -->


<!-- JQUERY JS -->
<script src="{{asset('/')}}backend/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('/')}}backend/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('/')}}backend/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('/')}}backend/plugins/p-scroll/perfect-scrollbar.js"></script>

<!-- STICKY JS -->
<script src="{{asset('/')}}backend/js/sticky.js"></script>



<!-- COLOR THEME JS -->
<script src="{{asset('/')}}backend/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('/')}}backend/js/custom.js"></script>

<!-- SWITCHER JS -->
<script src="{{asset('/')}}backend/switcher/js/switcher.js"></script>

</body>


</html>



