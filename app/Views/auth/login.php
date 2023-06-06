<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Mazer Admin Dashboard</title>

    <link rel="shortcut icon" href="/assets/compiled/png/logo-upt.png" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/compiled/css/app.css" />
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css" />
    <link rel="stylesheet" href="/assets/compiled/css/auth.css" />

    <script>
    // Make the screen zoom is 67% when the page is loaded and the screen is less than 1440px
    if (window.innerWidth < 1440) {
        document.body.style.zoom = "67%";
    }
    </script>
</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="/assets/compiled/svg/upt-komp.svg" alt="Logo" /></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">
                        Log in with your data that you entered during registration at
                        <span class="text-primary fw-bold">UPT</span> <span class="text-white fw-bold">KOMP</span>.
                    </p>

                    <form action="/">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="https://wa.me/088806923500" class="font-bold">Call Admin</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>

</html>