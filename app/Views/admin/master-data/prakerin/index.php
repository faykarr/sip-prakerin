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
                <!-- Modal -->
                <div class="modal fade text-left" id="tambahSiswaModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title white" id="myModalLabel1">
                                    <i class="fa-solid fa-user-plus me-3 fs-6"></i>
                                    Tambah Siswa Prakerin
                                </h5>
                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form class="form">
                                <div class="modal-body">
                                    <!-- Form Tambah Siswa -->
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nisn">
                                                    <i class="fa-solid fa-file-circle-check me-1"></i>
                                                    NISN
                                                </label>
                                                <input type="text" pattern="[0-9]{10}" id="nisn" class="form-control"
                                                    placeholder="NISN" name="nisn">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_siswa">
                                                    <i class="fa-solid fa-pen me-1"></i>
                                                    Nama Siswa
                                                </label>
                                                <input type="text" id="nama_lengkap" class="form-control"
                                                    placeholder="Nama Siswa" name="nama_siswa">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jekel">
                                                    <i class="fa-solid fa-venus-mars me-1"></i>
                                                    Jenis Kelamin
                                                </label>
                                                <select name="jenis_kelamin" id="jekel" class="form-select">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">
                                                    <i class="fa-solid fa-house-user me-1"></i>
                                                    Tempat Lahir
                                                </label>
                                                <input type="text" id="city-column" class="form-control"
                                                    placeholder="Tempat Lahir" name="tempat_lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">
                                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                                    Tanggal Lahir
                                                </label>
                                                <input type="text"
                                                    class="form-control mb-3 flatpickr-birth flatpickr-input"
                                                    placeholder="Pilih Tanggal" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_hp">
                                                    <i class="fa-solid fa-phone me-1"></i>
                                                    No HP Siswa
                                                </label>
                                                <input type="text" pattern="[0-9]{12}" id="no_hp" class="form-control"
                                                    placeholder="No HP" name="no_hp_siswa">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="asal_sekolah">
                                                    <i class="fa-solid fa-school me-1"></i>
                                                    Asal Sekolah
                                                </label>
                                                <select name="asal_sekolah" id="asal_sekolah" class="form-select">
                                                    <option value="">-- Pilih asal sekolah --</option>
                                                    <option value="SMK Negeri 2 Pekalongan">SMK Negeri 2 Pekalongan
                                                    </option>
                                                    <option value="SMK Negeri 3 Pekalongan">SMK Negeri 3 Pekalongan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kelas">
                                                    <i class="fa-solid fa-phone me-1"></i>
                                                    Kelas
                                                </label>
                                                <input type="text" id="kelas" class="form-control" placeholder="Kelas"
                                                    name="kelas">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jurusan">
                                                    <i class="fa-solid fa-school me-1"></i>
                                                    Jurusan
                                                </label>
                                                <select name="jurusan" id="jurusan" class="form-select">
                                                    <option value="">-- Pilih Jurusan --</option>
                                                    <option value="TKJ">Teknik Komputer & Jaringan
                                                    </option>
                                                    <option value="RPL">Rekayasa Perangkat Lunak
                                                    </option>
                                                    <option value="MM">Multimedia
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_mulai">
                                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                                    Tanggal Mulai Prakerin
                                                </label>
                                                <input type="text"
                                                    class="form-control mb-3 flatpickr-start flatpickr-input"
                                                    placeholder="Pilih Tanggal" id="tanggal_mulai" name="tanggal_mulai">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_pencabutan">
                                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                                    Tanggal Pencabutan Prakerin
                                                </label>
                                                <input type="text"
                                                    class="form-control mb-3 flatpickr-start flatpickr-input"
                                                    placeholder="Pilih Tanggal" id="tanggal_pencabutan"
                                                    name="tanggal_pencabutan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tahun_ajaran">
                                                    <i class="fa-solid fa-phone me-1"></i>
                                                    Tahun Ajaran
                                                </label>
                                                <input type="text" id="tahun_ajaran" class="form-control"
                                                    placeholder="Tahun Ajaran" name="tahun_ajaran">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_orang_tua">
                                                    <i class="fa-solid fa-phone me-1"></i>
                                                    Nama Orang Tua
                                                </label>
                                                <input type="text" id="nama_orang_tua" class="form-control"
                                                    placeholder="Nama orang tua" name="nama_orang_tua">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_hp_orang_tua">
                                                    <i class="fa-solid fa-phone me-1"></i>
                                                    No HP Orang Tua
                                                </label>
                                                <input type="text" id="no_hp_orang_tua" class="form-control"
                                                    placeholder="No HP orang tua" name="no_hp_orang_tua">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <select name="status_prakerin" id="status" class="form-select" disabled
                                                    hidden>
                                                    <option value="Active">Active</option>
                                                    <option value="Pencabutan">Pencabutan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Ketik alamat lengkap disini"
                                                    id="floatingTextarea" name="alamat"></textarea>
                                                <label for="floatingTextarea">
                                                    <i class="fa-solid fa-house-chimney me-1"></i>
                                                    Alamat Lengkap
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
                            <th>NISN</th>
                            <th>Nama Anak</th>
                            <th>Asal Sekolah</th>
                            <th>Tanggal Pencabutan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>0151770011</td>
                            <td>Adelia Rahmawati</td>
                            <td>SMK Negeri 2 Pekalongan</td>
                            <td>2023-07-15</td>
                            <td>
                                <span class="badge bg-success">Active</span>
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
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<!-- End Content -->
<?= $this->endSection(); ?>