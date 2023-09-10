<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KAS RPL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ asset('css/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/style.css')}}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links" style="z-index: 111111;">
            @auth
            <a href="{{ url('/home') }}" style="color: white; ">Home</a>
            @else
            <a href="{{ route('login') }}" style="color: white;">Login</a>

            {{-- @if (Route::has('register'))
            <a href="{{ route('register') }}" style="color: white;">Register</a>
            @endif --}}
            @endauth
        </div>
        @endif

        <div class="content">
            <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
                <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="carousel-container">
                            <h2 class="animate__animated animate__fadeInDown">Selamat datang di<span>sistem pencatatan kas<br>REKAYASA PERANGKAT LUNAK</span></h2>


                        </div>
                    </div>


                </div>

                <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
                    <defs>
                        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </defs>
                    <g class="wave1">
                        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                    </g>
                    <g class="wave2">
                        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                    </g>
                    <g class="wave3">
                        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                    </g>
                </svg>

            </section><!-- End Hero -->


        </div>
    </div>
</body>
<script src="{{ asset('public/js/main.js') }}"></script>

</html>
