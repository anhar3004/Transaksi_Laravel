<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Login Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('plugin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="{{ asset('plugin/css/theme.css') }}" rel="stylesheet" media="all">


</head>

<body class="body" >
    <div class="col-md-12">
        <div class="row">
            <form class="login" method="post" action="/cekLogin">
                {{ csrf_field() }}
                <div class="avatar">
                    <i class="fa fa-user"></i>
                </div>
                <br>
                <div class="box-login">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="email" autocomplete="off">
                </div>
                <div class="box-login">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                </div>
                <button type="submit" name="login" class="btn-login">Login</button>
                <div class="bottom">
                    <a href="">Register</a>
                    <a href="">Forgot Password</a>
                </div>
                @if (session('error'))
                <div class="alert alert-primary" role="alert">
                    {{ session('error') }}
                </div>
                 @endif
            </form>
        </div>
    </div>

</body>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</script>

<!-- Main JS-->
{{--  <script src="{{ asset('plugin/js/main.js') }}"></script>  --}}

</body>

</html>
<!-- end document-->
