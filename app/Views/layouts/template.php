<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=" UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?= $title; ?> - SIP-Prakerin
    </title>

    <link rel="shortcut icon" href="/assets/compiled/png/logo-upt.png" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="/assets/compiled/css/table-datatable.css" />
    <link rel="stylesheet" href="/assets/compiled/css/app.css" />
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css" />
    <link rel="stylesheet" href="/assets/compiled/css/iconly.css" />
    <link rel="stylesheet" href="/assets/extensions/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css">



    <script src="https://kit.fontawesome.com/712e5f8866.js" crossorigin="anonymous"></script>
    <script src="/assets/extensions/jquery/jquery.min.js"></script>
    <script>
        document.body.style.zoom = "70%";
    </script>
</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>
    <div id="app">
        <!-- Include sidebar php -->
        <?php include_once 'sidebar.php'; ?>
        <div id="main" class="layout-navbar navbar-fixed">
            <!-- Navbar top -->
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">
                                                <?= $first_name . " " . $last_name ?>
                                            </h6>
                                            <p class="mb-0 text-sm text-gray-600">
                                                <?= ucfirst($level) ?>
                                            </p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/assets/compiled/jpg/1.jpg" alt="Profile Picture" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem">
                                    <li>
                                        <h6 class="dropdown-header">Hello,
                                            <?= $first_name ?> !
                                        </h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/profile"><i
                                                class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- End Navbar top -->
            <!-- Content -->
            <div id="main-content">
                <?= $this->renderSection('body'); ?>
            </div>
            <!-- End Content -->
            <!-- Footer -->
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; UPT Komputer</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://github.com/faykarr">Faykar</a>
                        </p>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </div>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/assets/compiled/js/app.js"></script>

    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/static/js/pages/simple-datatables.js"></script>


    <script src="/assets/extensions/flatpickr/flatpickr.min.js"></script>
    <script src="/assets/static/js/pages/date-picker.js"></script>

    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>

    <script>

        const Swal2 = Swal.mixin({
            customClass: {
                input: 'form-control'
            }
        })

        $('.delete').on('click', function () {
            var getURL = $(this).attr('href');
            Swal2.fire({
                icon: "warning",
                title: "Are you sure want to delete this data?",
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonColor: '#B31312',
                confirmButtonText: 'Yes',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'No'
            }).then(result => {
                if (result.isConfirmed) {
                    window.location.href = getURL;
                }
            })
            return false;
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        $(function () {
            <?php if (session()->has('success')): ?>
                Toast.fire({
                    icon: 'success',
                    title: '<?= session()->getFlashdata('success') ?>'
                })
            <?php endif; ?>
            <?php if (session()->has('error')): ?>
                Toast.fire({
                    icon: 'error',
                    title: '<?= session()->getFlashdata('error') ?>'
                })
            <?php endif; ?>
        });
    </script>

</body>

</html>