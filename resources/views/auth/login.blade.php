<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - IT Asset</title>

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <style>
        body {
            background: linear-gradient(90deg, rgb(31,31,73), #121e36, #05368c);
        }
        .login-box {
            margin-top: 7%;
        }
    </style>
</head>
<body>

<div class="login-box">
    <div class="card card-outline card-primary shadow">
        <div class="card-header text-center">
            <h4><b>IT Asset System</b></h4>
        </div>

        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="username"
                           class="form-control"
                           placeholder="Username"
                           required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password"
                           class="form-control"
                           placeholder="Password"
                           required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block">
                    Login
                </button>

            </form>
        </div>
    </div>
</div>

</body>
</html>
