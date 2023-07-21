<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manage Registered Users Account</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mengelola daftar akun asisten yang terdaftar untuk kegiatan prakerin di UPT Komputer STMIK
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/input-data/nilai">Users Account</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar Akun Asisten
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
                    <h4 class="card-title col-lg-4">List Akun</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Asisten</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get data from $prakerin with foreach -->
                        <?php foreach ($users as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1; ?>
                                </td>
                                <td>
                                    <?= $value['nama_asisten']; ?>
                                </td>
                                <td>
                                    <?= $value['username']; ?>
                                </td>
                                <td>
                                    <?php if ($value['status'] == 'Aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Belum Dinilai</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Button to reset password same as username -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#resetPassword<?= $value['id_user']; ?>">
                                        Reset
                                        <i class="fa-solid fa-lock"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- End foreach -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<!-- End Content -->
<?= $this->endSection(); ?>