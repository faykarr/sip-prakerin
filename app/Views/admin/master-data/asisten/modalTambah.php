<!-- Modal -->
<div class="modal fade text-left" id="tambahAsistenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel1">
                    <i class="fa-solid fa-user-plus me-3 fs-6"></i>
                    Tambah data asisten
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="/master-data/asisten/addAsisten">
                    <!-- Form Tambah Siswa -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nim">
                                    NIM
                                </label>
                                <?php $isInvalidNIM = (session()->getFlashdata('nim')) ? 'is-invalid' : '' ?>
                                <input type="text" id="nim" class="form-control <?= $isInvalidNIM ?>" placeholder="NIM"
                                    name="nim" value="<?= old('nim') ?>">
                                <?php if (session()->getFlashdata('nim')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('nim') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_asisten">
                                    Nama Asisten
                                </label>
                                <?php $isInvalidAsisten = (session()->getFlashdata('nama_asisten')) ? 'is-invalid' : '' ?>
                                <input type="text" id="nama_asisten" class="form-control <?= $isInvalidAsisten ?>"
                                    placeholder="Nama Asisten" name="nama_asisten" value="<?= old('nama_asisten') ?>">
                                <?php if (session()->getFlashdata('nama_asisten')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('nama_asisten') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_hp">
                                    No HP
                                </label>
                                <?php $isInvalidNoHP = (session()->getFlashdata('no_hp')) ? 'is-invalid' : '' ?>
                                <input type="text" id="no_hp" class="form-control <?= $isInvalidNoHP ?>"
                                    placeholder="No HP" name="no_hp" value="<?= old('no_hp') ?>">
                                <?php if (session()->getFlashdata('no_hp')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('no_hp') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">
                                    Email
                                </label>
                                <?php $isInvalidEmail = (session()->getFlashdata('email')) ? 'is-invalid' : '' ?>
                                <input type="email" id="email" class="form-control <?= $isInvalidEmail ?>"
                                    placeholder="Email" name="email" value="<?= old('email') ?>">
                                <?php if (session()->getFlashdata('email')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('email') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jabatan">
                                    Jabatan
                                </label>
                                <select name="jabatan" id="jabatan" class="form-select">
                                    <option value="">-- Pilih Jabatan --</option>
                                    <option value="Koordinator">Koordinator</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Asisten">Asisten</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <?php $isInvalidAlamat = (session()->getFlashdata('alamat')) ? 'is-invalid' : '' ?>
                                <textarea class="form-control <?= $isInvalidAlamat ?>"
                                    placeholder="Ketik alamat lengkap disini" id="floatingTextarea"
                                    name="alamat"><?= old('alamat') ?></textarea>
                                <?php if (session()->getFlashdata('alamat')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('alamat') ?>
                                    </div>
                                <?php endif; ?>
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