<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    <?= $title ?>
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/master-data/smk">Master Data</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/master-data/smk">Daftar SMK</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?= $title ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-content">
                <img class="card-img-top img-fluid" src="/assets/compiled/jpg/school.jpg" alt="Card image cap"
                    style="height: 20rem">
                <div class="card-body">
                    <h4 class="card-title">
                        <?= $smk['nama_sekolah'] ?>
                    </h4>
                    <p class="text-muted">
                        Detail
                        <?= $smk['nama_sekolah'] ?>
                    </p>
                    <hr>
                    <div class="row justify-content-start">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            NPSN
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <strong>
                                                <?= $smk['npsn'] ?>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nama Sekolah
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?= $smk['nama_sekolah'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Alamat
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?= $smk['alamat_sekolah'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status Sekolah
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?= $smk['status_sekolah'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pembimbing Prakerin
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?= $smk['pembimbing_prakerin'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No. Telepon Pembimbing
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?= $smk['no_hp_pembimbing'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jurusan Terdaftar
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?= $smk['jurusan_terdaftar'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah Siswa Prakerin Terdaftar di UPT Komputer
                                        </td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?= random_int(0, 9) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status Aktif Prakerin</td>
                                        <td>
                                            <strong>:</strong>
                                        </td>
                                        <td>
                                            <?php if ($smk['status_aktif'] == "Aktif"): ?>
                                                <span class="badge bg-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="/master-data/smk" class="btn btn-primary block">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- End Content -->
<?= $this->endSection(); ?>