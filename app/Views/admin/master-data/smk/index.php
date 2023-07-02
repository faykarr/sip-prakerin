<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar SMK</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mengelola daftar SMK yang terdaftar untuk kegiatan prakerin di UPT Komputer STMIK Widya Pratama
                    Pekalongan.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/master-data/smk">Master Data</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar SMK
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
                    <h4 class="card-title col-lg-4">List SMK Terdaftar</h4>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSMKModal"
                        class="btn btn-success col-lg-2 align-items-center">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span class="ms-1">Tambah Data</span>
                    </button>
                </div>
                <!-- Include Modal Tambah -->
                <?= $this->include('/admin/master-data/smk/modalTambah') ?>
                <!-- Include Modal Tambah -->
            </div>
            <!-- Include Modal Edit -->
            <?= $this->include('/admin/master-data/smk/modalEdit') ?>
            <!-- Include Modal Edit -->
            <!-- Include Modal show -->
            <?= $this->include('/admin/master-data/smk/modalShow') ?>
            <!-- Include Modal show -->
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NPSN</th>
                            <th>Nama Sekolah</th>
                            <th>Jumlah Siswa Terdaftar</th>
                            <th>Status Prakerin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($smk as $key => $row): ?>
                            <tr>
                                <td>
                                    <?= ++$no ?>
                                </td>
                                <td>
                                    <?= $row['npsn'] ?>
                                </td>
                                <td>
                                    <?= $row['nama_sekolah'] ?>
                                </td>
                                <td>
                                    <?= random_int(0, 10) ?>
                                </td>
                                <td>
                                    <?php if ($row['status_aktif'] == 'Aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <!-- Show -->
                                        <a href="#" class="btn icon btn-sm btn-primary showSMK"
                                            data-npsn="<?= $row['npsn'] ?>" data-nama="<?= $row['nama_sekolah'] ?>"
                                            data-sekolah="<?= $row['status_sekolah'] ?>"
                                            data-pembimbing="<?= $row['pembimbing_prakerin'] ?>"
                                            data-nohp="<?= $row['no_hp_pembimbing'] ?>"
                                            data-jurusan="<?= $row['jurusan_terdaftar'] ?>"
                                            data-alamat="<?= $row['alamat_sekolah'] ?>"
                                            data-aktif="<?= $row['status_aktif'] ?>">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <!-- Edit -->
                                        <a href="#" class="btn icon btn-sm btn-warning text-white edit"
                                            data-npsn="<?= $row['npsn'] ?>" data-nama="<?= $row['nama_sekolah'] ?>"
                                            data-status="<?= $row['status_sekolah'] ?>"
                                            data-pembimbing="<?= $row['pembimbing_prakerin'] ?>"
                                            data-nohp="<?= $row['no_hp_pembimbing'] ?>"
                                            data-jurusan="<?= $row['jurusan_terdaftar'] ?>"
                                            data-alamat="<?= $row['alamat_sekolah'] ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <!-- Delete -->
                                        <a href="/master-data/smk/deleteSMK/<?= $row['npsn'] ?>"
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
        // Event delegation for edit button
        $(document).on('click', '.edit', function () {
            // Get data from button edit
            const npsn = $(this).data('npsn');
            const nama = $(this).data('nama');
            const status = $(this).data('status');
            const pembimbing = $(this).data('pembimbing');
            const nohp = $(this).data('nohp');
            const jurusan = $(this).data('jurusan');
            const alamat = $(this).data('alamat');

            // Set data to Form Edit
            $('.npsn').val(npsn);
            $('.nama').val(nama);
            $('.status').val(status).change();
            $('.pembimbing').val(pembimbing);
            $('.nohp').val(nohp);
            $('.jurusan').val(jurusan);
            $('.alamat').val(alamat);

            // Call Modal Edit
            $('#editSMKModal').modal('show');
        });

        // Event delegation for show button
        $(document).on('click', '.showSMK', function () {
            // Get data from button show
            const npsn = $(this).data('npsn');
            const nama = $(this).data('nama');
            const sekolah = $(this).data('sekolah');
            const pembimbing = $(this).data('pembimbing');
            const nohp = $(this).data('nohp');
            const jurusan = $(this).data('jurusan');
            const alamat = $(this).data('alamat');
            const aktif = $(this).data('aktif');

            // Set data to Show
            $('.npsn').text(npsn);
            $('.nama').text(nama);
            $('.sekolah').text(sekolah);
            $('.pembimbing').text(pembimbing);
            $('.nohp').text(nohp);
            $('.jurusan').text(jurusan);
            $('.alamat').text(alamat);

            if (aktif == 'Aktif') {
                $('.aktif').html('<span class="badge bg-success">Aktif</span>');
            } else {
                $('.aktif').html('<span class="badge bg-danger">Tidak Aktif</span>');
            }

            // Call Modal Show
            $('#showSMKModal').modal('show');
        });
    });

</script>

<!-- End Content -->
<?= $this->endSection(); ?>