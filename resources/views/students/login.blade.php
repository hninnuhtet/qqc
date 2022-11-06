<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/question.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a><b>QQC</b>login</a>
            </div>
            @if (Session::has('errorMessage'))
            <div class="alert alert-danger" id="sessionMessage">{{ Session::get('errorMessage') }}</div>
            @endif
            @if (Session::has('successMessage'))
            <div class="alert alert-success" id="sessionMessage">{{ Session::get('successMessage') }}</div>
            @endif

            @if(!empty($errorMessage))
            <div class="alert alert-danger" id="sessionMessage"> {{ $errorMessage }}</div>
            @endif
            @if(!empty($successMessage))
            <div class="alert alert-success" id="sessionMessage"> {{ $successMessage }}</div>
            @endif
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in</p>
                    <form action="{{ route('question.validateAccessCode', ['qs_id'=> $qs_id]) }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Password"
                                name="password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
        <script>
            // setTimeout(() => {
            //     document.getElementById('sessionMessage').style.display = 'none'
            // }, 2000);
        </script>
    </body>
</html>
