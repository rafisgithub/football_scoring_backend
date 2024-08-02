<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f4f4;
        }
        .login-body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .login-right-wrap {
            text-align: center;
        }
        .login-right-wrap h1 {
            margin-bottom: 20px;
        }
        .login-right-wrap .form-control {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .dont-have {
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="login-right">
                <div class="login-right-wrap">
                    <h1>Login</h1>
                    <p class="account-subtitle">Access to our dashboard</p>

                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input id="Email" type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input id="Password" type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-lg btn-block btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
