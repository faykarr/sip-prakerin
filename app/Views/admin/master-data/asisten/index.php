<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Asisten</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mengelola daftar asisten yang terdaftar di UPT Komputer STMIK Widya Pratama Pekalongan.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/master-data/asisten">Master Data</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar Asisten
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Include modalshow -->
    <?= $this->include('/admin/master-data/asisten/modalShow') ?>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="card-title col-lg-4">List Asisten Terdaftar</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Asisten</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- show data from database with foreach -->
                        <?php $i = 1; ?>
                        <?php foreach ($asisten as $a): ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $a['nim']; ?>
                                </td>
                                <td>
                                    <?= $a['nama_asisten']; ?>
                                </td>
                                <td>
                                    <?= $a['jabatan']; ?>
                                </td>
                                <td>
                                    <?php if ($a['status'] == 'Aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary showAsisten" data-nim="<?= $a['nim'] ?>"
                                        data-nama="<?= $a['nama_asisten'] ?>" data-nohp="<?= $a['no_hp'] ?>"
                                        data-email="<?= $a['email'] ?>" data-alamat="<?= $a['alamat'] ?>"
                                        data-jabatan="<?= $a['jabatan'] ?>" data-status="<?= $a['status'] ?>">
                                        <!-- Fontawesome fa-eye -->
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
    $(document).ready(function () {
        // Event delegation for show button
        $(document).on('click', '.showAsisten', function () {
            // Get data from button show
            const nim = $(this).data('nim');
            const nama = $(this).data('nama');
            const nohp = $(this).data('nohp');
            const email = $(this).data('email');
            const alamat = $(this).data('alamat');
            const jabatan = $(this).data('jabatan');
            const status = $(this).data('status');

            // Set data to Show
            $('.nim').html(nim);
            $('.nama_asisten').html(nama);
            $('.no_hp').html(nohp);
            $('.email').html(email);
            $('.alamat').html(alamat);
            $('.jabatan').html(jabatan);
            if (status == 'Aktif') {
                $('.status').html('<span class="badge bg-success">Aktif</span>');
            } else {
                $('.status').html('<span class="badge bg-danger">Tidak Aktif</span>');
            }

            // Call Modal Show
            $('#showAsistenModal').modal('show');
        });
    });

</script>

<!-- End Content -->
<?= $this->endSection(); ?>