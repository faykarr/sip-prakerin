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

    <!-- Include modalInput -->
    <?= $this->include('/general/nilai/modalInput') ?>
    <!-- Include modalInput -->
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
                                        <a href="#" class="btn icon btn-sm btn-primary text-white inputNilai"
                                            data-siswa="<?= $value['nama_siswa'] ?>"
                                            data-disiplin="<?= $value['disiplin'] ?>"
                                            data-kerja="<?= $value['kerja_motivasi'] ?>"
                                            data-hadir="<?= $value['kehadiran'] ?>"
                                            data-kreatif="<?= $value['inisiatif_kreatif'] ?>"
                                            data-jujur="<?= $value['kejujuran_tanggung_jawab'] ?>"
                                            data-sopan="<?= $value['kesopanan'] ?>" data-sama="<?= $value['kerjasama'] ?>"
                                            data-jumlah="<?= $value['jumlah_nilai'] ?>"
                                            data-rata="<?= $value['rata_rata'] ?>" data-id="<?= $value['id_prakerin'] ?>"
                                            data-sekolah="<?= $value['nama_sekolah'] ?>">
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
        // Event delegation for input button
        $(document).on('click', '.inputNilai', function () {
            // Get data from button
            const siswa = $(this).data('siswa');
            const disiplin = $(this).data('disiplin');
            const kerja = $(this).data('kerja');
            const hadir = $(this).data('hadir');
            const kreatif = $(this).data('kreatif');
            const jujur = $(this).data('jujur');
            const sopan = $(this).data('sopan');
            const sama = $(this).data('sama');
            const jumlah = $(this).data('jumlah');
            const rata = $(this).data('rata');
            const id = $(this).data('id');
            const sekolah = $(this).data('sekolah');

            // Set data to modal
            $('#nama_siswa').val(siswa);
            $('#disiplin').val(disiplin);
            $('#kerja_motivasi').val(kerja);
            $('#kehadiran').val(hadir);
            $('#inisiatif_kreatif').val(kreatif);
            $('#kejujuran_tanggung_jawab').val(jujur);
            $('#kesopanan').val(sopan);
            $('#kerjasama').val(sama);
            $('.jumlah_nilai').val(jumlah);
            $('.rata_rata').val(rata);
            $('#id_prakerin').val(id);
            $('#asal_sekolah').val(sekolah);

            // Calculate and display the total nilai and rata-rata real-time
            $('.nilai').on('input', function () {
                let jumlah_nilai = 0;
                $('.nilai').each(function () {
                    jumlah_nilai += parseInt($(this).val() || 0);
                });
                const jumlah_nilai_input = jumlah_nilai / 7; // Jumlah nilai dibagi dengan jumlah input nilai
                $('.jumlah_nilai').val(jumlah_nilai);
                $('.rata_rata').val(jumlah_nilai_input.toFixed(2)); // Tampilkan 2 desimal angka di rata-rata
            });

            // Call Modal Edit
            $('#inputNilai').modal('show');
        });
    });
</script>

<!-- End Content -->
<?= $this->endSection(); ?>