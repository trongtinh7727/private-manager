<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard Pro by Creative Tim</title>
    @include('Layout.header')
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=" # ">Private Manager</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="material-icons">dashboard</i>
                            Dashboard
                        </a>
                    </li>
                    <li class=" active ">
                        <a href="{{ route('register') }}">
                            <i class="material-icons">person_add</i>
                            Register
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('login') }}">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="../../assets/img/register.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-offset-3">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Register</h2>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group is-empty">
                                                    <input id="name" type="text" placeholder="Tên..."
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group is-empty">
                                                    <input id="email" type="email" placeholder="Email..."
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group is-empty">
                                                    <input id="password" type="password" placeholder="Password..."
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback text-danger " role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group is-empty">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        placeholder="Password confirmation..."
                                                        name="password_confirmation" required
                                                        autocomplete="new-password">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="full-page-background" style="background-image: url(../../assets/img/register.jpeg) "></div>
        </div>
    </div>
</body>
@include('Layout.footer')
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>
