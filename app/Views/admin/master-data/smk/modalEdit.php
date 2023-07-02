<!-- Modal Edit Start -->
<div class="modal fade text-left" id="editSMKModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel1">
                    <i class="fa-solid fa-file-circle-plus me-3 fs-6"></i>
                    Edit data SMK
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="/master-data/smk/updateSMK">
                    <!-- Form Edit SMK -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="npsn">
                                    <i class="fa-solid fa-file-circle-check me-1"></i>
                                    NPSN
                                </label>
                                <?php $isInvalidNPSN = (session()->getFlashdata('npsn')) ? 'is-invalid' : '' ?>
                                <input type="text" id="npsn" class="form-control npsn <?= $isInvalidNPSN ?>"
                                    placeholder="NPSN" name="npsn" value="<?= old('npsn') ?>" readonly>
                                <?php if (session()->getFlashdata('npsn')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('npsn') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_sekolah">
                                    <i class="fa-solid fa-pen me-1"></i>
                                    Nama Sekolah
                                </label>
                                <?php $isInvalidNama = (session()->getFlashdata('nama_sekolah')) ? 'is-invalid' : '' ?>
                                <input type="text" id="nama_sekolah" class="form-control nama <?= $isInvalidNama ?>"
                                    placeholder="Nama Sekolah" name="nama_sekolah" value="<?= old('nama_sekolah') ?>">
                                <?php if (session()->getFlashdata('nama_sekolah')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('nama_sekolah') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="status_sekolah">
                                    <i class="fa-solid fa-school me-1"></i>
                                    Status Sekolah
                                </label>
                                <select name="status_sekolah" id="status_sekolah" class="form-select status">
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
                                <?php $isInvalidPembimbing = (session()->getFlashdata('pembimbing_prakerin')) ? 'is-invalid' : '' ?>
                                <input type="text" id="pembimbing_prakerin"
                                    class="form-control pembimbing <?= $isInvalidPembimbing ?>"
                                    placeholder="Nama Pembimbing Prakerin" name="pembimbing_prakerin"
                                    value="<?= old('pembimbing_prakerin') ?>">
                                <?php if (session()->getFlashdata('pembimbing_prakerin')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('pembimbing_prakerin') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_hp_pembimbing">
                                    <i class="fa-solid fa-phone me-1"></i>
                                    No HP Pembimbing Prakerin
                                </label>
                                <?php $isInvalidNoHP = (session()->getFlashdata('no_hp_pembimbing')) ? 'is-invalid' : '' ?>
                                <input type="text" id="no_hp_pembimbing" class="form-control nohp <?= $isInvalidNoHP ?>"
                                    placeholder="No HP Pembimbing Prakerin" name="no_hp_pembimbing"
                                    value="<?= old('no_hp_pembimbing') ?>">
                                <?php if (session()->getFlashdata('no_hp_pembimbing')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('no_hp_pembimbing') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jurusan_terdaftar">
                                    <i class="fa-solid fa-book me-1"></i>
                                    Jurusan Terdaftar Prakerin
                                </label>
                                <?php $isInvalidJurusan = (session()->getFlashdata('jurusan_terdaftar')) ? 'is-invalid' : '' ?>
                                <input type="text" id="jurusan_terdaftar"
                                    class="form-control jurusan <?= $isInvalidJurusan ?>"
                                    placeholder="Jurusan yang terdaftar prakerin di UPTKOMP" name="jurusan_terdaftar"
                                    value="<?= old('jurusan_terdaftar') ?>">
                                <?php if (session()->getFlashdata('jurusan_terdaftar')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('jurusan_terdaftar') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <?php $isInvalidAlamat = (session()->getFlashdata('alamat_sekolah')) ? 'is-invalid' : '' ?>
                                <textarea class="form-control alamat <?= $isInvalidAlamat ?>"
                                    placeholder="Ketik alamat lengkap disini" id="floatingTextarea"
                                    name="alamat_sekolah"><?= old('alamat_sekolah') ?></textarea>
                                <?php if (session()->getFlashdata('alamat_sekolah')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('alamat_sekolah') ?>
                                    </div>
                                <?php endif; ?>
                                <label for="floatingTextarea">
                                    <i class="fa-solid fa-house-chimney me-1"></i>
                                    Alamat Lengkap Sekolah
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Form Edit SMK -->
            </div>
            <div class="modal-footer">
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
<!-- Modal Edit End -->