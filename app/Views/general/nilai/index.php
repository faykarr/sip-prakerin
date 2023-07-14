<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Nilai Siswa Prakerin</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mengelola daftar nilai siswa prakerin yang terdaftar untuk kegiatan prakerin di UPT Komputer STMIK
                    Widya
                    Pratama
                    Pekalongan.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/input-data/nilai">Master Data</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar Nilai Siswa
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
                    <h4 class="card-title col-lg-4">List Nilai Siswa</h4>
                </div>
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
                                    <div class="btn-group">
                                        <!-- Input Nilai -->
                                        <a href="#" class="btn icon btn-sm btn-primary text-white inputNilai">
                                            <i class="fa-solid fa-pen-to-square"></i>
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

<!-- Script for inputNilai -->
<script>
    $(document).ready(function () {
        // Event delegation for show button
        $(document).on('click', '.inputNilai', function () {
        });
    });
</script>

<!-- End Content -->
<?= $this->endSection(); ?>