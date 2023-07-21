<!-- Modal -->
<div class="modal fade text-left" id="inputNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel1">
                    <i class="fa-solid fa-file-circle-plus me-3 fs-6"></i>
                    Input Nilai Prakerin Siswa
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="/input-data/nilai/saveNilai">
                    <!-- Form Tambah Siswa -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_siswa">
                                    <span class="fw-bold">Nama Siswa</span>
                                </label>
                                <input type="text" id="nama_siswa" class="form-control" name="nama_siswa" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="asal_sekolah">
                                    <span class="fw-bold">Asal Sekolah</span>
                                </label>
                                <input type="text" id="asal_sekolah" class="form-control" name="asal_sekolah" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="disiplin">
                                    <span class="fw-bold">Nilai Disiplin</span>
                                </label>
                                <?php $disiplin = (session()->getFlashdata('disiplin')) ? 'is-invalid' : '' ?>
                                <input type="number" id="disiplin" class="form-control nilai <?= $disiplin ?>"
                                    name="disiplin" step="any">
                                <?php if (session()->getFlashdata('disiplin')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('disiplin') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kerja_motivasi">
                                    <span class="fw-bold">Nilai Kerja/Motivasi</span>
                                </label>
                                <?php $kerja_motivasi = (session()->getFlashdata('kerja_motivasi')) ? 'is-invalid' : '' ?>

                                <input type="number" id="kerja_motivasi"
                                    class="form-control nilai <?= $kerja_motivasi ?>" name="kerja_motivasi" step="any">
                                <?php if (session()->getFlashdata('kerja_motivasi')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('kerja_motivasi') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kehadiran">
                                    <span class="fw-bold">Nilai Kehadiran</span>
                                </label>
                                <?php $kehadiran = (session()->getFlashdata('kehadiran')) ? 'is-invalid' : '' ?>

                                <input type="number" id="kehadiran" class="form-control nilai <?= $kehadiran ?>"
                                    name="kehadiran" step="any">
                                <?php if (session()->getFlashdata('kehadiran')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('kehadiran') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="inisiatif_kreatif">
                                    <span class="fw-bold">Nilai Inisiatif/Kreatif</span>
                                </label>
                                <?php $inisiatif_kreatif = (session()->getFlashdata('inisiatif_kreatif')) ? 'is-invalid' : '' ?>

                                <input type="number" id="inisiatif_kreatif"
                                    class="form-control <?= $inisiatif_kreatif ?> nilai" name="inisiatif_kreatif"
                                    step="any">
                                <?php if (session()->getFlashdata('inisiatif_kreatif')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('inisiatif_kreatif') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kejujuran_tanggung_jawab">
                                    <span class="fw-bold">Nilai Kejujuran/Tanggung Jawab</span>
                                </label>
                                <?php $kejujuran_tanggung_jawab = (session()->getFlashdata('kejujuran_tanggung_jawab')) ? 'is-invalid' : '' ?>

                                <input type="number" id="kejujuran_tanggung_jawab"
                                    class="form-control <?= $kejujuran_tanggung_jawab ?> nilai"
                                    name="kejujuran_tanggung_jawab" step="any">
                                <?php if (session()->getFlashdata('kejujuran_tanggung_jawab')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('kejujuran_tanggung_jawab') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kesopanan">
                                    <span class="fw-bold">Nilai Kesopanan</span>
                                </label>
                                <?php $kesopanan = (session()->getFlashdata('kesopanan')) ? 'is-invalid' : '' ?>

                                <input type="number" id="kesopanan" class="form-control <?= $kesopanan ?> nilai"
                                    name="kesopanan" step="any">
                                <?php if (session()->getFlashdata('kesopanan')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('kesopanan') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kerjasama">
                                    <span class="fw-bold">Nilai Kerjasama</span>
                                </label>
                                <?php $kerjasama = (session()->getFlashdata('kerjasama')) ? 'is-invalid' : '' ?>

                                <input type="number" id="kerjasama" class="form-control <?= $kerjasama ?> nilai"
                                    name="kerjasama" step="any">
                                <?php if (session()->getFlashdata('kerjasama')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('kerjasama') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="jumlah_nilai">
                                    <span class="fw-bold">Jumlah Nilai</span>
                                </label>
                                <input type="number" id="jumlah_nilai" class="form-control" name="jumlah_nilai"
                                    step="any" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="rata_rata">
                                    <span class="fw-bold">Rata-rata Nilai</span>
                                </label>
                                <input type="number" id="rata_rata" class="form-control" name="rata_rata" step="any"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <!-- Form Tambah Siswa -->
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_prakerin" id="id_prakerin">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->