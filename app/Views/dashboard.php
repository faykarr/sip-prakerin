<!-- Extend layouts template in layouts/template -->
<?= $this->extend('layouts/template'); ?>
<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">
                    Hello, Welcome
                    <?= $first_name . " " . $last_name ?> !
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">About SIP Prakerin</h4>
            </div>
            <div class="card-body">
                <p>
                    SIP Prakerin adalah sebuah sistem informasi yang digunakan untuk memudahkan penilaian data
                    prakerin di UPT Komputer STMIK Widya Pratama Pekalongan.
                </p>

                <p>
                    Anda sebagai admin dapat mengelola data prakerin yang ada di UPT Komputer STMIK Widya Pratama
                    Pekalongan. Jangan lupa untuk mengingatkan asisten untuk mengisi kegiatan prakerin setiap harinya.
                </p>
            </div>
        </div>

        <?php if (session()->get('level') == 'admin'): ?>
            <!-- Statistic -->
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                        <div class="stats-icon purple mb-2">
                                            <!-- <i class="iconly-boldShow"></i> -->
                                            <i class="fa-solid fa-school"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                        <h6 class="text-muted font-semibold">
                                            Jumlah SMK Terdaftar
                                        </h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?= random_int(0, 25) ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                        <div class="stats-icon blue mb-2">
                                            <!-- <i class="iconly-boldProfile"></i> -->
                                            <i class="fa-solid fa-user-group"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                        <h6 class="text-muted font-semibold">Jumlah Anak Prakerin Aktif</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?= random_int(0, 30) ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                        <div class="stats-icon green mb-2">
                                            <!-- <i class="iconly-boldAdd-User"></i> -->
                                            <i class="fa-solid fa-user-graduate"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                        <h6 class="text-muted font-semibold">Total Anak Prakerin</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?= random_int(0, 70) ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <!-- <i class="iconly-boldBookmark"></i> -->
                                            <i class="fa-solid fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                        <h6 class="text-muted font-semibold">Total Asisten Dosen</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?= random_int(0, 31) ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
</div>


<!-- End Content -->
<?= $this->endSection(); ?>