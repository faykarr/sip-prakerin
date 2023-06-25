<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar SMK</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mengelola daftar SMK yang terdaftar untuk kegiatan prakerin di UPT Komputer STMIK Widya Pratama
                    Pekalongan.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/master-data/smk">Master Data</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar SMK
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
                    <h4 class="card-title col-lg-4">List SMK Terdaftar</h4>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSMKModal"
                        class="btn btn-success col-lg-2 align-items-center">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span class="ms-1">Tambah Data</span>
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade text-left" id="tambahSMKModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title white" id="myModalLabel1">
                                    <i class="fa-solid fa-file-circle-plus me-3 fs-6"></i>
                                    Tambah data SMK
                                </h5>
                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form" method="post" action="/master-data/smk/addSMK">
                                    <!-- Form Tambah Siswa -->
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="npsn">
                                                    <i class="fa-solid fa-file-circle-check me-1"></i>
                                                    NPSN
                                                </label>
                                                <input type="text" pattern="[0-9]{8}" id="npsn" class="form-control"
                                                    placeholder="NPSN" name="npsn">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_sekolah">
                                                    <i class="fa-solid fa-pen me-1"></i>
                                                    Nama Sekolah
                                                </label>
                                                <input type="text" id="nama_sekolah" class="form-control"
                                                    placeholder="Nama Sekolah" name="nama_sekolah">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status_sekolah">
                                                    <i class="fa-solid fa-school me-1"></i>
                                                    Status Sekolah
                                                </label>
                                                <select name="status_sekolah" id="status_sekolah" class="form-select">
                                                    <option value="Negeri">Negeri</option>
                                                    <option value="Swasta">Swasta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pembimbing_prakerin">
                                                    <i class="fa-solid fa-user me-1"></i>
                                                    Nama Pembimbing Prakerin
                                                </label>
                                                <input type="text" id="pembimbing_prakerin" class="form-control"
                                                    placeholder="Nama Pembimbing Prakerin" name="pembimbing_prakerin">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_hp_pembimbing">
                                                    <i class="fa-solid fa-phone me-1"></i>
                                                    No HP Pembimbing Prakerin
                                                </label>
                                                <input type="text" pattern="[0-9]{12}" id="no_hp_pembimbing"
                                                    class="form-control" placeholder="No HP Pembimbing Prakerin"
                                                    name="no_hp_pembimbing">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jurusan_terdaftar">
                                                    <i class="fa-solid fa-book me-1"></i>
                                                    Jurusan Terdaftar Prakerin
                                                </label>
                                                <input type="text" id="jurusan_terdaftar" class="form-control"
                                                    placeholder="Jurusan yang terdaftar prakerin di UPTKOMP"
                                                    name="jurusan_terdaftar">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Ketik alamat lengkap disini"
                                                    id="floatingTextarea" name="alamat_sekolah"></textarea>
                                                <label for="floatingTextarea">
                                                    <i class="fa-solid fa-house-chimney me-1"></i>
                                                    Alamat Lengkap Sekolah
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Tambah Siswa -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tambah</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NPSN</th>
                            <th>Nama Sekolah</th>
                            <th>Jumlah Siswa Terdaftar</th>
                            <th>Status Prakerin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($smk as $key => $row): ?>
                            <tr>
                                <td>
                                    <?= ++$no ?>
                                </td>
                                <td>
                                    <?= $row['npsn'] ?>
                                </td>
                                <td>
                                    <?= $row['nama_sekolah'] ?>
                                </td>
                                <td>
                                    <?= random_int(0, 10) ?>
                                </td>
                                <td>
                                    <?php if ($row['status_aktif'] == 'Aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <!-- Show -->
                                        <a href="#" class="btn icon btn-sm btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <!-- Edit -->
                                        <a href="#" class="btn icon btn-sm btn-warning text-white">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <!-- Delete -->
                                        <a href="#" class="btn icon btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
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