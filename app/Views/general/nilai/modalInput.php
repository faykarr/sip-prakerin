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
                <form class="form" method="post" action="/input-data/nilai/addNilai">
                    <!-- Form Tambah Siswa -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama_siswa">
                                    <span class="fw-bold">Nama Siswa</span>
                                </label>
                                <input type="text" id="nama_siswa" class="form-control" name="nama_siswa" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="disiplin">
                                    <span class="fw-bold">Nilai Disiplin</span>
                                </label>
                                <input type="number" id="disiplin" class="form-control nilai" name="disiplin"
                                    step="any">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kerja_motivasi">
                                    <span class="fw-bold">Nilai Kerja/Motivasi</span>
                                </label>
                                <input type="number" id="kerja_motivasi" class="form-control nilai"
                                    name="kerja_motivasi" step="any">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kehadiran">
                                    <span class="fw-bold">Nilai Kehadiran</span>
                                </label>
                                <input type="number" id="kehadiran" class="form-control nilai" name="kehadiran"
                                    step="any">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="inisiatif_kreatif">
                                    <span class="fw-bold">Nilai Inisiatif/Kreatif</span>
                                </label>
                                <input type="number" id="inisiatif_kreatif" class="form-control nilai"
                                    name="inisiatif_kreatif" step="any">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kejujuran_tanggung_jawab">
                                    <span class="fw-bold">Nilai Kejujuran/Tanggung Jawab</span>
                                </label>
                                <input type="number" id="kejujuran_tanggung_jawab" class="form-control nilai"
                                    name="kejujuran_tanggung_jawab" step="any">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kesopanan">
                                    <span class="fw-bold">Nilai Kesopanan</span>
                                </label>
                                <input type="number" id="kesopanan" class="form-control nilai" name="kesopanan"
                                    step="any">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="kerjasama">
                                    <span class="fw-bold">Nilai Kerjasama</span>
                                </label>
                                <input type="number" id="kerjasama" class="form-control nilai" name="kerjasama"
                                    step="any">
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
                <input type="hidden" name="id_nilai" id="id_nilai">
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