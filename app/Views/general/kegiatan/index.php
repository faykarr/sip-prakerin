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
    <!-- Include modalShow -->
    <?= $this->include('/general/kegiatan/modalShow') ?>
    <!-- Inlcude modalEdit -->
    <?= $this->include('/general/kegiatan/modalEdit') ?>

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
                            <th width="15%%">Nama Asisten</th>
                            <th>Tanggal</th>
                            <th>Ruang Lab</th>
                            <th width="30%">Detail Kegiatan</th>
                            <th>Aksi</th>
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
                                    <?= $k['nim']; ?>
                                </td>
                                <td>
                                    <?= $k['nama_asisten']; ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y', strtotime($k['tanggal'])); ?>
                                </td>
                                <td>
                                    <?= $k['ruang_lab']; ?>
                                </td>
                                <td>
                                    <?= $k['detail_kegiatan']; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn icon btn-sm btn-primary showBAK" data-nim="<?= $k['nim'] ?>"
                                            data-nama-asisten="<?= $k['nama_asisten'] ?>"
                                            data-asisten="<?= $k['asisten_pembantu'] ?>" data-tanggal="<?= $k['tanggal'] ?>"
                                            data-waktu="<?= $k['waktu'] ?>" data-ruang="<?= $k['ruang_lab'] ?>"
                                            data-kegiatan="<?= $k['detail_kegiatan'] ?>">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn icon btn-sm btn-warning text-white edit"
                                            data-id="<?= $k['id_kegiatan'] ?>" data-nama-asisten="<?= $k['nama_asisten'] ?>"
                                            data-asisten="<?= $k['asisten_pembantu'] ?>" data-tanggal="<?= $k['tanggal'] ?>"
                                            data-waktu="<?= $k['waktu'] ?>" data-ruang="<?= $k['ruang_lab'] ?>"
                                            data-kegiatan="<?= $k['detail_kegiatan'] ?>"
                                            data-id-asisten="<?= $k['id_asisten'] ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="/input-data/kegiatan/deleteKegiatan/<?= $k['id_kegiatan']; ?>"
                                            class="btn icon btn-sm btn-danger delete">
                                            <i class="fa-solid fa-trash"></i>
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

<script>
    $(document).ready(function () {
        // Event delegation for show button
        $(document).on('click', '.showBAK', function () {
            // Get data from button show
            const nim = $(this).data('nim');
            const nama = $(this).data('nama-asisten');
            const asisten = $(this).data('asisten');
            const tanggal = $(this).data('tanggal');
            const waktu = $(this).data('waktu');
            const ruang = $(this).data('ruang');
            const kegiatan = $(this).data('kegiatan');


            // Set data to Show
            $('.primary').text(nim);
            $('.asisten').text(nama);
            $('.asisten_pembantu').text(asisten);
            var date = moment(tanggal, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.tanggal_kegiatan').text(date);
            $('.waktu').text(waktu);
            $('.ruang_lab').text(ruang);
            $('.detail_kegiatan').text(kegiatan);

            // Call Modal Show
            $('#showBAKModal').modal('show');
        });
        // Event delegation for show button
        $(document).on('click', '.edit', function () {
            // Get data from button edit
            const id = $(this).data('id');
            const nim = $(this).data('nim');
            const nama = $(this).data('nama-asisten');
            const asisten = $(this).data('asisten');
            const tanggal = $(this).data('tanggal');
            const waktu = $(this).data('waktu');
            const ruang = $(this).data('ruang');
            const kegiatan = $(this).data('kegiatan');
            const id_asisten = $(this).data('id-asisten');

            // Set data to form with class edit
            $('.name').val(nama);
            $('.id_kegiatan').val(id);
            $('.pembantu').val(asisten).change();
            var date = moment(tanggal, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.tanggal').val(date);
            $('.waktu_kegiatan').val(waktu);
            $('.lab').val(ruang).change();
            $('.kegiatan').val(kegiatan);
            $('.id_asisten').val(id_asisten);


            // Call Modal Show
            $('#editBAKModal').modal('show');
        });
    });

</script>

<!-- End Content -->
<?= $this->endSection(); ?>