<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Berita Acara Kegiatan Prakerin</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Input berita acara kegiatan prakerin yang telah dilaksanakan. Input sesuai dengan waktu shift
                    kegiatan prakerinnya.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/input-data/kegiatan">Input Data</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Kegiatan Harian
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Include modalTambah-->
    <?= $this->include('/general/kegiatan/modalTambah') ?>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="card-title col-lg-4">Daftar Berita Acara Kegiatan</h4>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahBAKModal"
                        class="btn btn-success col-lg-2 align-items-center">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span class="ms-1">Input BAK</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th width="12%">NIM</th>
                            <th width="20%">Nama Asisten</th>
                            <th>Tanggal</th>
                            <th>Ruang Lab</th>
                            <th width="30%">Detail Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>21.230.0194</td>
                            <td>Muhammad Rahman Arsalan</td>
                            <td>12/08/2021</td>
                            <td>Lab. Komputer 1</td>
                            <td>Membuat aplikasi learning management system menggunakan PHP</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn icon btn-sm btn-primary showBAK">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn icon btn-sm btn-warning text-white edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="/input-data/deleteKegiatan/" class="btn icon btn-sm btn-danger delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
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