<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In - Laundry Xpert</title>

    {{-- Link bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Link Css --}}
    <link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet">

    {{-- Link Animate Css --}}
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">

    {{-- Link Icon Favicon --}}
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">

    @notifyCss
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">

                {{-- Bagian Kiri Form Login --}}
                <div class="col-sm-6 text-black form-login animate__animated animate__bounceIn">
                    <div class="d-flex align-items-center h-custom-2">
                        <div class="col-lg-30">

                            {{-- Bagian form login --}}
                            <form action="{{ route('login.aksi') }}" method="POST" class="user">

                                {{-- Bagian header --}}
                                <div class="text-center mb-4 d-flex flex-column justify-content-center">
                                    <img src="images/logo/logolaundry.svg" alt=""
                                        style="width: 250px; height: 100px;" class="mx-auto d-block">
                                    <h1 class="text-h1 pt-2 mt-3 text-center"
                                        style="letter-spacing: -1px; font-weight: 800;">Welcome Back!
                                    </h1>
                                    <p class="mb-3 pb-1" style="letter-spacing: -0.5px">Sistem Pengelola Laundry Cepat
                                        dan Mudah</p>
                                </div>

                                {{-- untuk menampilkan pesan erors dari controller --}}
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger p-2">
                                        <ul class="m-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- inputan username --}}
                                <div class="mb-3">
                                    <input type="email" id="email"
                                        class="form-control form-control-lg input-login" placeholder="Email"
                                        name="email" required>
                                </div>

                                {{-- inputan password --}}
                                <div class="mb-4">
                                    <input type="password" id="password"
                                        class="form-control form-control-lg input-login" placeholder="Password"
                                        name="password" required>
                                </div>

                                {{-- tombol sign in --}}
                                <div class="mb-3 pt-3">
                                    <button class="btn btn-lg btn-block fw-bold w-100 text-light" type="submit">Sign
                                        In</button>
                                </div>

                                {{-- link menuju form register --}}
                                <p class="text-center pt-4">Don't have an account? <a href="{{ route('register') }}"
                                        class="link-info">Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End bagian konten kiri --}}

                {{-- Bagian konten kanan gambar --}}
                <div class="col-sm-6 px-0 d-none d-sm-block image-login animate__animated animate__fadeIn">
                </div>
                {{-- End bagian konten kanan --}}

            </div>
        </div>
    </section>

    <x-notify::notify />

    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    {{-- Notify javascript --}}
    @notifyJs
</body>

</html>
