<!DOCTYPE html>
<html lang="en" data-bs-theme=dark>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - SIP-Prakerin</title>

    <link rel="shortcut icon" href="/assets/compiled/png/logo-upt.png" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/compiled/css/app.css" />
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css" />
    <link rel="stylesheet" href="/assets/compiled/css/auth.css" />
    <link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css" />

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

                    <form action="/login/process" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <?php $isInvalidUser = (session()->getFlashdata('username')) ? 'is-invalid' : '' ?>
                            <input type="text" class="form-control form-control-xl <?= $isInvalidUser ?>"
                                placeholder="Username" name="username" value="<?= old('username') ?>" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <?php if (session()->getFlashdata('username')): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('username') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <?php $isInvalidPass = (session()->getFlashdata('password')) ? 'is-invalid' : '' ?>
                            <input type="password" class="form-control form-control-xl <?= $isInvalidPass ?>"
                                placeholder="Password" name="password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <?php if (session()->getFlashdata('password')): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('password') ?>
                                </div>
                            <?php endif; ?>
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

    <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/static/js/pages/sweetalert2.js"></script>
</body>

</html>