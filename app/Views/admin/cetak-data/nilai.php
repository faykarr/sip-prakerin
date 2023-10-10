<!-- Extend to layout/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Section Body -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cetak Nilai Siswa</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mencetak nilai siswa prakerin yang telah menyelesaikan prakerin.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url("/cetak-data/kegiatan") ?>">
                                Cetak Data
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Nilai Siswa
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title col-lg-4">Cetak Nilai</h4>
                <hr>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai Akhir</th>
                            <th>Predikat</th>
                            <th>Status Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get data from $prakerin with foreach -->
                        <?php foreach ($nilai as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['nama_siswa'] ?>
                                </td>
                                <td>
                                    <?= $value['nama_sekolah'] ?>
                                </td>
                                <td>
                                    <?= $value['rata_rata'] ?>
                                </td>
                                <td>
                                    <?= $value['predikat'] ?>
                                </td>
                                <td>
                                    <?php if ($value['status_nilai'] == 'Dinilai'): ?>
                                        <span class="badge bg-success">Dinilai</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Belum Dinilai</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Cetak nilai, bisa cetak jika sudah dinilai, jika belum tidak bisa -->
                                    <?php if ($value['status_nilai'] == 'Dinilai'): ?>
                                        <a href="<?= base_url("/cetak-data/nilai/print/") ?><?= $value['id_nilai'] ?>"
                                            class="btn btn-primary btn-sm">
                                            <i data-feather="printer"></i>
                                            Cetak
                                        </a>
                                    <?php else: ?>
                                        <a href="#" class="btn btn-primary btn-sm disabled">
                                            <i data-feather="printer"></i>
                                            Cetak
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Section -->
</div>

<!-- EndSection Body -->
<?= $this->endSection(); ?>