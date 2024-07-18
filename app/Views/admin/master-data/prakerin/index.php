<!-- Extends layout template from layouts/template -->
<?= $this->extend('layouts/template'); ?>

<!-- Start Content -->
<?= $this->section('body'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Siswa Prakerin</h3>
                <p class="text-subtitle text-muted">
                    <!-- Fitur untuk mengelola daftar asisten terdaftar -->
                    Mengelola daftar siswa prakerin yang terdaftar untuk kegiatan prakerin di UPT Komputer STMIK Widya
                    Pratama
                    Pekalongan.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url("/master-data/prakerin") ?>">Master Data</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar Siswa Prakerin
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Include Modal Tambah -->
    <?= $this->include('/admin/master-data/prakerin/modalTambah') ?>
    <!-- Include Modal Tambah -->
    <!-- Include Modal Tambah -->
    <?= $this->include('/admin/master-data/prakerin/modalEdit') ?>
    <!-- Include Modal Tambah -->
    <!-- Include Modal Tambah -->
    <?= $this->include('/admin/master-data/prakerin/modalShow') ?>
    <!-- Include Modal Tambah -->

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="card-title col-lg-4">List Siswa Terdaftar</h4>
                    <div class="d-flex flex-column flex-sm-row justify-content-end col-lg-4">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSiswaModal"
                            class="btn btn-success align-items-center me-2 me-sm-2 mb-2 mb-sm-0">
                            <i class="fa-solid fa-file-excel"></i>
                            <span class="ms-1">Export Excel</span>
                        </button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSiswaModal"
                            class="btn btn-success align-items-center">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            <span class="ms-1">Tambah Data</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Jurusan</th>
                            <th>Tanggal Pencabutan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get data from $prakerin with foreach -->
                        <?php foreach ($prakerin as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['nisn'] ?>
                                </td>
                                <td>
                                    <?= $value['nama_siswa'] ?>
                                </td>
                                <td>
                                    <?= $value['nama_sekolah'] ?>
                                </td>
                                <td>
                                    <?= $value['jurusan'] ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y', strtotime($value['periode_akhir'])); ?>
                                </td>
                                <td>
                                    <?php if ($value['status_prakerin'] == 'Aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Pencabutan</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <!-- Show -->
                                        <a href="#" class="btn icon btn-sm btn-primary showPrakerin"
                                            data-nisn="<?= $value['npsn'] ?>" data-nama-siswa="<?= $value['nama_siswa'] ?>"
                                            data-jenis-kelamin="<?= $value['jenis_kelamin'] ?>"
                                            data-tempat-lahir="<?= $value['tempat_lahir'] ?>"
                                            data-tanggal-lahir="<?= $value['tanggal_lahir'] ?>"
                                            data-nohp-siswa="<?= $value['no_hp_siswa'] ?>"
                                            data-asal-sekolah="<?= $value['nama_sekolah'] ?>"
                                            data-kelas="<?= $value['kelas'] ?>" data-jurusan="<?= $value['jurusan'] ?>"
                                            data-tanggal-mulai="<?= $value['periode_awal'] ?>"
                                            data-tanggal-pencabutan="<?= $value['periode_akhir'] ?>"
                                            data-tahun-ajaran="<?= $value['tahun_ajaran'] ?>"
                                            data-nama-ortu="<?= $value['nama_orang_tua'] ?>"
                                            data-nohp-ortu="<?= $value['no_hp_orang_tua'] ?>"
                                            data-alamat="<?= $value['alamat_siswa'] ?>"
                                            data-aktif="<?= $value['status_prakerin'] ?>"
                                            data-id="<?= $value['id_prakerin'] ?>">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <!-- Edit -->
                                        <a href="#" class="btn icon btn-sm btn-warning text-white edit"
                                            data-nisn="<?= $value['npsn'] ?>" data-nama-siswa="<?= $value['nama_siswa'] ?>"
                                            data-jenis-kelamin="<?= $value['jenis_kelamin'] ?>"
                                            data-tempat-lahir="<?= $value['tempat_lahir'] ?>"
                                            data-tanggal-lahir="<?= $value['tanggal_lahir'] ?>"
                                            data-nohp-siswa="<?= $value['no_hp_siswa'] ?>"
                                            data-asal-sekolah="<?= $value['npsn'] ?>" data-kelas="<?= $value['kelas'] ?>"
                                            data-jurusan="<?= $value['jurusan'] ?>"
                                            data-tanggal-mulai="<?= $value['periode_awal'] ?>"
                                            data-tanggal-pencabutan="<?= $value['periode_akhir'] ?>"
                                            data-tahun-ajaran="<?= $value['tahun_ajaran'] ?>"
                                            data-nama-ortu="<?= $value['nama_orang_tua'] ?>"
                                            data-nohp-ortu="<?= $value['no_hp_orang_tua'] ?>"
                                            data-alamat="<?= $value['alamat_siswa'] ?>"
                                            data-aktif="<?= $value['status_prakerin'] ?>"
                                            data-id="<?= $value['id_prakerin'] ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <!-- Delete -->
                                        <a href="<?= base_url("/master-data/prakerin/deletePrakerin/") ?><?= $value['id_prakerin'] ?>"
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
            const id = $(this).data('id');
            const nisn = $(this).data('nisn');
            const namaSiswa = $(this).data('nama-siswa');
            const jenisKelamin = $(this).data('jenis-kelamin');
            const tempatLahir = $(this).data('tempat-lahir');
            const tanggalLahir = $(this).data('tanggal-lahir');
            const noHPSiswa = $(this).data('nohp-siswa');
            const asalSekolah = $(this).data('asal-sekolah');
            const kelas = $(this).data('kelas');
            const jurusan = $(this).data('jurusan');
            const tanggalMulai = $(this).data('tanggal-mulai');
            const tanggalPencabutan = $(this).data('tanggal-pencabutan');
            const tahunAjaran = $(this).data('tahun-ajaran');
            const namaOrtu = $(this).data('nama-ortu');
            const noHPOrtu = $(this).data('nohp-ortu');
            const alamat = $(this).data('alamat');
            const aktif = $(this).data('aktif');


            // Set data to Form Edit
            $('.id_prakerin').val(id);
            $('.nisn').val(nisn);
            $('.nama_siswa').val(namaSiswa);
            $('.jenis_kelamin').val(jenisKelamin).change();
            $('.tempat_lahir').val(tempatLahir);
            var date_lahir = moment(tanggalLahir, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.tanggal_lahir').val(date_lahir);
            $('.no_hp_siswa').val(noHPSiswa);
            $('.asal_sekolah').val(asalSekolah).change();
            $('.kelas').val(kelas);
            $('.jurusan').val(jurusan).change();
            var date_mulai = moment(tanggalMulai, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.tanggal_mulai').val(date_mulai);
            var date_cabut = moment(tanggalPencabutan, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.tanggal_pencabutan').val(date_cabut);
            $('.tahun_ajaran').val(tahunAjaran);
            $('.nama_orang_tua').val(namaOrtu);
            $('.no_hp_orang_tua').val(noHPOrtu);
            $('.alamat').val(alamat);
            $('.status_prakerin').val(aktif).change();


            // Call Modal Edit
            $('#editSiswaModal').modal('show');
        });

        // Event delegation for show button
        $(document).on('click', '.showPrakerin', function () {
            // Get data from button show
            const id = $(this).data('id');
            const nisn = $(this).data('nisn');
            const namaSiswa = $(this).data('nama-siswa');
            const jenisKelamin = $(this).data('jenis-kelamin');
            const tempatLahir = $(this).data('tempat-lahir');
            const tanggalLahir = $(this).data('tanggal-lahir');
            const noHPSiswa = $(this).data('nohp-siswa');
            const asalSekolah = $(this).data('asal-sekolah');
            const kelas = $(this).data('kelas');
            const jurusan = $(this).data('jurusan');
            const tanggalMulai = $(this).data('tanggal-mulai');
            const tanggalPencabutan = $(this).data('tanggal-pencabutan');
            const tahunAjaran = $(this).data('tahun-ajaran');
            const namaOrtu = $(this).data('nama-ortu');
            const noHPOrtu = $(this).data('nohp-ortu');
            const alamat = $(this).data('alamat');
            const aktif = $(this).data('aktif');

            // Set data to Show
            $('.id_prakerin').html(id);
            $('.nisn').html(nisn);
            $('.nama_siswa').html(namaSiswa);
            $('.jekel').html(jenisKelamin);
            $('.tempat_lahir').html(tempatLahir);
            var dateLahir = moment(tanggalLahir, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.Tanggallahir').html(dateLahir);
            $('.no_hp_siswa').html(noHPSiswa);
            $('.asal').html(asalSekolah);
            $('.kelas').html(kelas);
            $('.keahlian').html(jurusan);
            var dateMulai = moment(tanggalMulai, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.Tanggalmulai').html(dateMulai);
            var dateCabut = moment(tanggalPencabutan, 'YYYY-MM-DD').format('DD-MM-YYYY');
            $('.Tanggalpencabutan').html(dateCabut);
            $('.tahun_ajaran').html(tahunAjaran);
            $('.nama_orang_tua').html(namaOrtu);
            $('.no_hp_orang_tua').html(noHPOrtu);
            $('.alamat').html(alamat);


            if (aktif == 'Aktif') {
                $('.aktif').html('<span class="badge bg-success">Aktif</span>');
            } else {
                $('.aktif').html('<span class="badge bg-danger">Pencabutan</span>');
            }

            // Call Modal Show
            $('#showSiswaModal').modal('show');
        });
    });

</script>


<!-- End Content -->
<?= $this->endSection(); ?>