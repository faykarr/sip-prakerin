<!-- Modal -->
<div class="modal fade text-left" id="inputNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel1">
                    <i class="fa-solid fa-file-circle-plus me-3 fs-6"></i>
                    Input Berita Acara Kegiatan
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="/input-data/nilai/addNilai">
                    <!-- Form Tambah Siswa -->
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="nama_asisten">
                                    <span class="fw-bold">Penanggung Jawab Kegiatan</span>
                                </label>
                                <input type="text" id="nama_asisten" class="form-control" placeholder="nama_asisten"
                                    name="nama_asisten" value="<?= $first_name ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="nama_sekolah">
                                    Asisten Pembantu
                                </label>
                                <?php $asisten_pembantu = (session()->getFlashdata('asisten_pembantu')) ? 'is-invalid' : '' ?>
                                <select name="asisten_pembantu" id="asisten_pembantu"
                                    class="form-select <?= $asisten_pembantu ?>">
                                    <option value="Tidak Ada">-- Tidak Ada --</option>
                                    <?php foreach ($asisten as $s): ?>
                                        <option <?= (old('asisten_pembantu') == $s['nama_asisten'] ? 'selected' : '') ?>
                                            value="<?= $s['nama_asisten'] ?>"><?= $s['nama_asisten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (session()->getFlashdata('asisten_pembantu')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('asisten_pembantu') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="ruang_lab">
                                    Ruang Lab
                                </label>
                                <select name="ruang_lab" id="ruang_lab" class="form-select">
                                    <option value="Lab Komputer 1">Lab Komputer 1</option>
                                    <option value="Lab Komputer 2">Lab Komputer 2</option>
                                    <option value="Lab Komputer 3">Lab Komputer 3</option>
                                    <option value="Lab Komputer 4">Lab Komputer 4</option>
                                    <option value="Lab Komputer 5">Lab Komputer 5</option>
                                    <option value="Lab Komputer 6">Lab Komputer 6</option>
                                    <option value="Lab Komputer 7">Lab Komputer 7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <?php $detail_kegiatan = (session()->getFlashdata('detail_kegiatan')) ? 'is-invalid' : '' ?>
                                <textarea class="form-control <?= $detail_kegiatan ?>"
                                    placeholder="Ketik detail kegiatan disini" id="floatingTextarea"
                                    name="detail_kegiatan"><?= old('detail_kegiatan') ?></textarea>
                                <?php if (session()->getFlashdata('detail_kegiatan')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('detail_kegiatan') ?>
                                    </div>
                                <?php endif; ?>
                                <label for="floatingTextarea">
                                    Detail Kegiatan
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Form Tambah Siswa -->
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_kegiatan">
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