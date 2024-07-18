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
                            <a href="<?= base_url("/dashboard") ?>">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-school"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                    <h6 class="text-muted font-semibold">Jumlah SMK Terdaftar</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_smk; ?></h6>
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
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                    <h6 class="text-muted font-semibold">Siswa Prakerin Aktif</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_prakerin_aktif; ?></h6>
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
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                    <h6 class="text-muted font-semibold">Total Siswa Prakerin</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_prakerin; ?></h6>
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
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                    <h6 class="text-muted font-semibold">Total Asisten Dosen</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_asisten; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jadwal Kegiatan Prakerin</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-center" style="height: 290px">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Asisten</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500" rowspan="4">Senin</td>
                                            <td>08:00 - 10:00</td>
                                            <td class="text-bold-500">Budi</td>
                                        </tr>
                                        <tr>
                                            <td>10:30 - 12:00</td>
                                            <td class="text-bold-500">Fadli</td>
                                        </tr>
                                        <tr>
                                            <td>13:00 - 15:00</td>
                                            <td class="text-bold-500">Fina</td>
                                        </tr>
                                        <tr>
                                            <td>15:30 - 17:00</td>
                                            <td class="text-bold-500">Farriq</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500" rowspan="4">Selasa</td>
                                            <td>08:00 - 10:00</td>
                                            <td class="text-bold-500">Budi</td>
                                        </tr>
                                        <tr>
                                            <td>10:30 - 12:00</td>
                                            <td class="text-bold-500">Fadli</td>
                                        </tr>
                                        <tr>
                                            <td>13:00 - 15:00</td>
                                            <td class="text-bold-500">Fina</td>
                                        </tr>
                                        <tr>
                                            <td>15:30 - 17:00</td>
                                            <td class="text-bold-500">Farriq</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500" rowspan="4">Rabu</td>
                                            <td>08:00 - 10:00</td>
                                            <td class="text-bold-500">Budi</td>
                                        </tr>
                                        <tr>
                                            <td>10:30 - 12:00</td>
                                            <td class="text-bold-500">Fadli</td>
                                        </tr>
                                        <tr>
                                            <td>13:00 - 15:00</td>
                                            <td class="text-bold-500">Fina</td>
                                        </tr>
                                        <tr>
                                            <td>15:30 - 17:00</td>
                                            <td class="text-bold-500">Farriq</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500" rowspan="4">Kamis</td>
                                            <td>08:00 - 10:00</td>
                                            <td class="text-bold-500">Budi</td>
                                        </tr>
                                        <tr>
                                            <td>10:30 - 12:00</td>
                                            <td class="text-bold-500">Fadli</td>
                                        </tr>
                                        <tr>
                                            <td>13:00 - 15:00</td>
                                            <td class="text-bold-500">Fina</td>
                                        </tr>
                                        <tr>
                                            <td>15:30 - 17:00</td>
                                            <td class="text-bold-500">Farriq</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500" rowspan="4">Sabtu</td>
                                            <td>08:00 - 10:00</td>
                                            <td class="text-bold-500" rowspan="2">Dibagi ke Lab</td>
                                        </tr>
                                        <tr>
                                            <td>10:30 - 12:00</td>
                                        </tr>
                                        <tr>
                                            <td>13:00 - 15:00</td>
                                            <td class="text-bold-500" rowspan="2">Dibagi ke Lab</td>
                                        </tr>
                                        <tr>
                                            <td>15:30 - 17:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url("/assets/compiled/jpg/default-profile.jpg") ?>" alt="Profile Picture" />
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= $first_name?></h5>
                            <h6 class="text-muted mb-0">@<?= $first_name?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Rank Tutor</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="./assets/compiled/jpg/4.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Budi Utomo</h5>
                            <h6 class="text-muted mb-0">32x Tutor</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="./assets/compiled/jpg/5.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Mumtaza</h5>
                            <h6 class="text-muted mb-0">10x Tutor</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="./assets/compiled/jpg/1.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Faykar</h5>
                            <h6 class="text-muted mb-0">9x Tutor</h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <button class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">
                            Lihat Semuanya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- End Content -->
<?= $this->endSection(); ?>