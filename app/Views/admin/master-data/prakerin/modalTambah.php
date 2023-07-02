<!-- Modal -->
<div class="modal fade text-left" id="tambahSiswaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel1">
                    <i class="fa-solid fa-user-plus me-3 fs-6"></i>
                    Tambah Siswa Prakerin
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form" method="post" action="/master-data/prakerin/addPrakerin">
                <div class="modal-body">
                    <!-- Form Tambah Siswa -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nisn">
                                    <i class="fa-solid fa-file-circle-check me-1"></i>
                                    NISN
                                </label>
                                <input type="text" id="nisn" class="form-control" placeholder="NISN" name="nisn">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_siswa">
                                    <i class="fa-solid fa-pen me-1"></i>
                                    Nama Siswa
                                </label>
                                <input type="text" id="nama_lengkap" class="form-control" placeholder="Nama Siswa"
                                    name="nama_siswa">
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
                                <input type="text" id="city-column" class="form-control" placeholder="Tempat Lahir"
                                    name="tempat_lahir">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">
                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                    Tanggal Lahir
                                </label>
                                <input type="text" class="form-control mb-3 flatpickr-birth flatpickr-input"
                                    placeholder="Pilih Tanggal" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_hp">
                                    <i class="fa-solid fa-phone me-1"></i>
                                    No HP Siswa
                                </label>
                                <input type="text" id="no_hp" class="form-control" placeholder="No HP"
                                    name="no_hp_siswa">
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
                                    <?php foreach ($sekolah as $s): ?>
                                        <option value="<?= $s['npsn'] ?>"><?= $s['nama_sekolah'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="kelas">
                                    <i class="fa-solid fa-phone me-1"></i>
                                    Kelas
                                </label>
                                <input type="text" id="kelas" class="form-control" placeholder="Kelas" name="kelas">
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
                                <input type="text" class="form-control mb-3 flatpickr-start flatpickr-input"
                                    placeholder="Pilih Tanggal" id="tanggal_mulai" name="tanggal_mulai">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_pencabutan">
                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                    Tanggal Pencabutan Prakerin
                                </label>
                                <input type="text" class="form-control mb-3 flatpickr-start flatpickr-input"
                                    placeholder="Pilih Tanggal" id="tanggal_pencabutan" name="tanggal_pencabutan">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tahun_ajaran">
                                    <i class="fa-solid fa-phone me-1"></i>
                                    Tahun Ajaran
                                </label>
                                <input type="text" id="tahun_ajaran" class="form-control" placeholder="Tahun Ajaran"
                                    name="tahun_ajaran">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_orang_tua">
                                    <i class="fa-solid fa-phone me-1"></i>
                                    Nama Orang Tua
                                </label>
                                <input type="text" id="nama_orang_tua" class="form-control" placeholder="Nama orang tua"
                                    name="nama_orang_tua">
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
                                <select name="status_prakerin" id="status" class="form-select" disabled hidden>
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