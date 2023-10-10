<!-- Extend to layout/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Section Body -->
<?= $this->section('body'); ?>

<script>
    var base_url = "<?php echo base_url(); ?>"; 
</script>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cetak Laporan Kegiatan</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mencetak daftar kegiatan prakerin yang telah dilakukan oleh asisten.
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
                            Laporan Kegiatan
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
                <div class="row">
                    <label for="date_range">
                        <!-- Fontawesome calender icon -->
                        <i class="fas fa-calendar-alt me-1"></i>
                        Pilih periode tanggal
                    </label>
                    <div class="col-md-5 col-12 mt-3">
                        <input type="text" class="form-control" placeholder="Select date..." id="date_range"
                            name="date_range">
                    </div>
                    <div class="col-md-7 col-12 mt-3">
                        <!-- Button to show the filter -->
                        <button type="button" class="btn btn-primary me-2" id="btn-filter">
                            <i class="fas fa-filter me-1"></i>
                            Filter
                        </button>
                        <!-- Button to reset the filter -->
                        <button type="button" class="btn btn-secondary me-2" id="btn-reset">
                            <i class="fas fa-sync-alt me-1"></i>
                            Reset
                        </button>
                        <!-- Button to print the filter -->
                        <button type="button" class="btn btn-success" id="btn-print">
                            <i class="fas fa-print me-1"></i>
                            Cetak
                        </button>
                    </div>
                </div>
                <hr>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Asisten</th>
                            <th>Asisten Pembantu</th>
                            <th width="12%">Tanggal</th>
                            <th width="12%">Jam</th>
                            <th>Ruang Lab</th>
                            <th>Detail Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Foreach data -->
                        <?php $i = 1; ?>
                        <?php foreach ($kegiatan as $k): ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $k['nama_asisten']; ?>
                                </td>
                                <td>
                                    <?= $k['asisten_pembantu']; ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y', strtotime($k['tanggal'])); ?>
                                </td>
                                <td>
                                    <?= date('H:i', strtotime($k['waktu'])) . ' WIB'; ?>
                                </td>
                                <td>
                                    <?= $k['ruang_lab']; ?>
                                </td>
                                <td>
                                    <?= $k['detail_kegiatan']; ?>
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