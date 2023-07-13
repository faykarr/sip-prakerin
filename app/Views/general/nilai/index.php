<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Siswa Prakerin</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mengelola daftar siswa prakerin yang terdaftar untuk kegiatan prakerin di UPT Komputer STMIK Widya
                    Pratama
                    Pekalongan.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/master-data/prakerin">Master Data</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar Siswa Prakerin
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="card-title col-lg-4">List Siswa Terdaftar</h4>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSiswaModal"
                        class="btn btn-success col-lg-2 align-items-center">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span class="ms-1">Tambah Data</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Jurusan</th>
                            <th>Tanggal Pencabutan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get data from $prakerin with foreach -->
                        <?php foreach ($prakerin as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['nisn'] ?>
                                </td>
                                <td>
                                    <?= $value['nama_siswa'] ?>
                                </td>
                                <td>
                                    <?= $value['nama_sekolah'] ?>
                                </td>
                                <td>
                                    <?= $value['jurusan'] ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y', strtotime($value['periode_akhir'])); ?>
                                </td>
                                <td>
                                    <?php if ($value['status_prakerin'] == 'Aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Pencabutan</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <!-- Show -->
                                        <a href="#" class="btn icon btn-sm btn-primary showPrakerin">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <!-- Edit -->
                                        <a href="#" class="btn icon btn-sm btn-warning text-white edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<!-- End Content -->
<?= $this->endSection(); ?>