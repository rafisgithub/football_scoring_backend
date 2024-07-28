<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Tegistration</title>

    <link rel="shortcut icon" href="{{ asset('admin-assets') }}/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/css/style.css">

</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <form action="{{ route('admin.register') }}" method="POST">
                                    @csrf

                                    <label for="Name">Name</label>
                                    <input id="Name" type="text" class="form-control" name="name">

                                    <label for="Email">Email</label>
                                    <input id="Email" type="email" class="form-control" name="email">

                                    <label for="Password">Password</label>
                                    <input id="Password" type="password" class="form-control" name="password">

                                    <label for="Confirm Password">Confirm Password</label>
                                    <input id="Confirm Password" type="password" class="form-control" name="password_confirmation">

                                    <button class="btn btn-primary btn-block mt-3" type="submit">Register</button>
                            </form>

                            <div class="text-center dont-have">Already have an account? <a href="{{ route('admin.login.form') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('admin-assets') }}/js/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('admin-assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('admin-assets') }}/js/bootstrap.min.js"></script>

    <script src="{{ asset('admin-assets') }}/js/feather.min.js"></script>

    <script src="{{ asset('admin-assets') }}/js/script.js"></script>
</body>

</html>