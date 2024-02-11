<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="COURSE">
    <meta property="og:title" content="COURSE">
    <meta property="og:description" content="COURSE">

    <!-- PAGE TITLE HERE -->
    <title>Sign in | SMARTTraining</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FAVICONS ICON -->
    <link href="{{ asset('sipenmaru/vendor/login/style.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container sign-up-mode">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                    {{ csrf_field() }}

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ session('loginError') }}
                        </div>
                    @endif
                    @error('email')
                        <div class="alert alert-warning alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ $message }}
                        </div>
                    @enderror
                    @error('password')
                        <div class="alert alert-warning alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ $message }}
                        </div>
                    @enderror

                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Input your email" name="email" value="{{ old('email') }}"
                            autocomplete='off' />

                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Input your password" name="password" autocomplete='off' />

                    </div>
                    <input type="submit" value="Sign In" class="btn solid" />
                    <br>
                    <hr>
                </form>


                <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                    @csrf
                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ session('loginError') }}
                        </div>
                    @endif
                    @error('name')
                        <div class="alert alert-warning alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ $message }}
                        </div>
                    @enderror
                    @error('email')
                        <div class="alert alert-warning alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ $message }}
                        </div>
                    @enderror
                    @error('phone')
                        <div class="alert alert-warning alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ $message }}
                        </div>
                    @enderror
                    @error('password')
                        <div class="alert alert-warning alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ $message }}
                        </div>
                    @enderror
                    @error('password_confirmation')
                        <div class="alert alert-warning alert-dismissible fade show">
                            <i class="fas fa-triangle-exclamation"></i>
                            <strong>Warning!</strong> {{ $message }}
                        </div>
                    @enderror
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Fullname" name="name" value="{{ old('name') }}"
                            autocomplete='off' />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                            autocomplete='off' />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" placeholder="Phone" name="phone" value="{{ old('phone') }}"
                            autocomplete='off' />
                    </div>
                    @auth
                        @if (Auth::user()->role == '0')
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <select class="custom-select" id="inputGroupSelect01" name="role">
                                    <option selected disabled>Choose...</option>
                                    <option value="0">Admin</option>
                                    <option value="1">User</option>
                                </select>
                            </div>
                        @endif
                    @endauth

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" autocomplete='off' />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="password_confirmation"
                            autocomplete='off' />
                    </div>
                    <input type="submit" class="btn" value="Sign Up" />

                    <br>
                    <hr>
                </form>


            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Please sign up here to start your journey!
                    </p>
                    <a href="{{ route('register') }}">
                        Sign Up
                    </a>
                </div>
                <img src="{{ asset('sipenmaru/images/beranda.png') }}" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Already one of us ?</h3>
                    <p style="margin-bottom:15px">
                        Please sign in here to continue your journey!.
                    </p>
                    <a href="{{ route('login') }}"
                        style="border: 2px solid white; border-radius: 29px; padding:7px;text-decoration:none;">
                        <style>
                            a {
                                color: white;

                            }

                            a:hover {
                                background-color: white;
                                color: black;
                            }
                        </style>
                        Sign in
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--<script src="{{ asset('sipenmaru/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/login/appjs') }}"></script>
    <script src="{{ asset('sipenmaru/js/custom.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/js/dlabnav-init.js') }}"></script>-->
    <script src="{{ asset('sipenmaru/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/login/app.js') }}"></script>
</body>

</html>
