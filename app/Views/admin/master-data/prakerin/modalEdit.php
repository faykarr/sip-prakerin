<!-- Modal -->
<div class="modal fade text-left" id="editSiswaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
            <form class="form" method="post" action="/master-data/prakerin/updatePrakerin">
                <div class="modal-body">
                    <!-- Form Tambah Siswa -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nisn">
                                    NISN
                                </label>
                                <?php $nisn = (session()->getFlashdata('nisn')) ? 'is-invalid' : '' ?>
                                <input type="text" id="nisn" class="form-control <?= $nisn ?> nisn" placeholder="NISN"
                                    name="nisn" value="<?= old('nisn') ?>" readonly>
                                <?php if (session()->getFlashdata('nisn')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('nisn') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_siswa">
                                    Nama Siswa
                                </label>
                                <?php $nama_siswa = (session()->getFlashdata('nama_siswa')) ? 'is-invalid' : '' ?>
                                <input type="text" id="nama_lengkap" class="form-control nama_siswa <?= $nama_siswa ?>"
                                    placeholder="Nama Siswa" name="nama_siswa" value="<?= old('nama_siswa') ?>">
                                <?php if (session()->getFlashdata('nama_siswa')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('nama_siswa') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jekel">
                                    Jenis Kelamin
                                </label>
                                <select name="jenis_kelamin" id="jekel" class="form-select jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">
                                    Tempat Lahir
                                </label>
                                <?php $tempat_lahir = (session()->getFlashdata('tempat_lahir')) ? 'is-invalid' : '' ?>
                                <input type="text" id="city-column"
                                    class="form-control tempat_lahir <?= $tempat_lahir ?>" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="<?= old('tempat_lahir') ?>">
                                <?php if (session()->getFlashdata('tempat_lahir')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('tempat_lahir') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">
                                    Tanggal Lahir
                                </label>
                                <?php $tanggal_lahir = (session()->getFlashdata('tanggal_lahir')) ? 'is-invalid' : '' ?>
                                <input type="text"
                                    class="form-control <?= $tanggal_lahir ?> tanggal_lahir mb-3 flatpickr-birth flatpickr-input"
                                    placeholder="Pilih Tanggal" id="tanggal_lahir" name="tanggal_lahir"
                                    value="<?= old('tanggal_lahir') ?>">
                                <?php if (session()->getFlashdata('tanggal_lahir')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('tanggal_lahir') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_hp">
                                    No HP Siswa
                                </label>
                                <?php $no_hp_siswa = (session()->getFlashdata('no_hp_siswa')) ? 'is-invalid' : '' ?>
                                <input type="text" id="no_hp" class="form-control no_hp_siswa <?= $no_hp_siswa ?>"
                                    placeholder="No HP" name="no_hp_siswa" value="<?= old('no_hp_siswa') ?>">
                                <?php if (session()->getFlashdata('no_hp_siswa')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('no_hp_siswa') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="asal_sekolah">
                                    Asal Sekolah
                                </label>
                                <?php $asal_sekolah = (session()->getFlashdata('asal_sekolah')) ? 'is-invalid' : '' ?>
                                <select name="asal_sekolah" id="asal_sekolah"
                                    class="form-select asal_sekolah <?= $asal_sekolah ?>">
                                    <option value="">-- Pilih asal sekolah --</option>
                                    <?php foreach ($sekolah as $s): ?>
                                        <option <?= (old('asal_sekolah') == $s['npsn'] ? 'selected' : '') ?>
                                            value="<?= $s['npsn'] ?>"><?= $s['nama_sekolah'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (session()->getFlashdata('asal_sekolah')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('asal_sekolah') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="kelas">
                                    Kelas
                                </label>
                                <?php $kelas = (session()->getFlashdata('kelas')) ? 'is-invalid' : '' ?>
                                <input type="text" id="kelas" class="form-control kelas <?= $kelas ?>"
                                    placeholder="Kelas" name="kelas" value="<?= old('kelas') ?>">
                                <?php if (session()->getFlashdata('kelas')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('kelas') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jurusan">
                                    Jurusan
                                </label>
                                <?php $jurusan = (session()->getFlashdata('jurusan')) ? 'is-invalid' : '' ?>
                                <select name="jurusan" id="jurusan" class="form-select jurusan <?= $jurusan ?>">
                                    <option value="">-- Pilih Jurusan --</option>
                                    <option <?= (old('asal_sekolah') == 'TKJ' ? 'selected' : '') ?> value="TKJ">Teknik
                                        Komputer & Jaringan
                                    </option>
                                    <option <?= (old('asal_sekolah') == 'RPL' ? 'selected' : '') ?> value="RPL">Rekayasa
                                        Perangkat Lunak
                                    </option>
                                    <option <?= (old('asal_sekolah') == 'MM' ? 'selected' : '') ?> value="MM">Multimedia
                                    </option>
                                </select>
                                <?php if (session()->getFlashdata('jurusan')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('jurusan') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_mulai">
                                    Tanggal Mulai Prakerin
                                </label>
                                <?php $tanggal_mulai = (session()->getFlashdata('tanggal_mulai')) ? 'is-invalid' : '' ?>
                                <input type="text"
                                    class="form-control <?= $tanggal_mulai ?> tanggal_mulai mb-3 flatpickr-start flatpickr-input"
                                    placeholder="Pilih Tanggal" id="tanggal_mulai" name="tanggal_mulai"
                                    value="<?= old('tanggal_mulai') ?>">
                                <?php if (session()->getFlashdata('tanggal_mulai')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('tanggal_mulai') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_pencabutan">
                                    Tanggal Pencabutan Prakerin
                                </label>
                                <input type="text"
                                    class="form-control tanggal_pencabutan mb-3 flatpickr-start flatpickr-input"
                                    placeholder="Pilih Tanggal" id="tanggal_pencabutan" name="tanggal_pencabutan"
                                    value="<?= old('tanggal_pencabutan') ?>">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tahun_ajaran">
                                    Tahun Ajaran
                                </label>
                                <?php $tahun_ajaran = (session()->getFlashdata('tahun_ajaran')) ? 'is-invalid' : '' ?>
                                <input type="text" id="tahun_ajaran"
                                    class="form-control tahun_ajaran <?= $tahun_ajaran ?>" placeholder="Tahun Ajaran"
                                    name="tahun_ajaran" value="<?= old('tahun_ajaran') ?>">
                                <?php if (session()->getFlashdata('tahun_ajaran')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('tahun_ajaran') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_orang_tua">
                                    Nama Orang Tua
                                </label>
                                <?php $nama_orang_tua = (session()->getFlashdata('nama_orang_tua')) ? 'is-invalid' : '' ?>
                                <input type="text" id="nama_orang_tua"
                                    class="form-control nama_orang_tua <?= $nama_orang_tua ?>"
                                    placeholder="Nama orang tua" name="nama_orang_tua"
                                    value="<?= old('nama_orang_tua') ?>">
                                <?php if (session()->getFlashdata('nama_orang_tua')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('nama_orang_tua') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_hp_orang_tua">
                                    No HP Orang Tua
                                </label>
                                <?php $no_hp_orang_tua = (session()->getFlashdata('no_hp_orang_tua')) ? 'is-invalid' : '' ?>
                                <input type="text" id="no_hp_orang_tua"
                                    class="form-control no_hp_orang_tua <?= $no_hp_orang_tua ?>"
                                    placeholder="No HP orang tua" name="no_hp_orang_tua"
                                    value="<?= old('no_hp_orang_tua') ?>">
                                <?php if (session()->getFlashdata('no_hp_orang_tua')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('no_hp_orang_tua') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="status_prakerin">
                                    Status Prakerin
                                </label>
                                <select name="status_prakerin" id="status" class="form-select status_prakerin">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Pencabutan">Pencabutan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <?php $alamat = (session()->getFlashdata('alamat')) ? 'is-invalid' : '' ?>
                                <textarea class="form-control alamat <?= $alamat ?>"
                                    placeholder="Ketik alamat lengkap disini" id="floatingTextarea"
                                    name="alamat"><?= old('alamat') ?></textarea>
                                <label for="floatingTextarea">
                                    Alamat Lengkap
                                </label>
                                <?php if (session()->getFlashdata('alamat')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('alamat') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Form Tambah Siswa -->
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="id_prakerin" name="id_prakerin">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->