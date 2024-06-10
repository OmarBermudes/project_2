<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }} ">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="{{ route('validate-login') }}">
                        @csrf
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            <label class="form-label" for="email">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password"
                                class="form-control form-control-lg" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                              <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                          </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>

                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-block">Register</a>

                        <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
                            style="background-color: #3b5998" href="#!" role="button">
                            <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                        </a>
                        <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
                            style="background-color: #dd4b39" href="#!" role="button">
                            <i class="fab fa-google me-2"></i>Continue with Google</a>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"></script>

</body>

</html>
