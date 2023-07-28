<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Hasil Kegiatan Prakerin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            margin-bottom: 20px;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 10px;
            justify-content: center;
        }

        .kop-surat img {
            width: 80px;
            margin-right: 10px;
            align-self: flex-start;
            position: absolute;
            left: 40;
            top: 30;
            bottom: 0;
        }

        .judul-kop h1 {
            text-align: center;
            font-size: 21px;
            margin-left: 55px;
            margin-top: 0;
            margin-bottom: 0;
            margin-right: 0;
            align-self: flex-end;
        }

        .judul-kop p {
            text-align: center;
            margin-left: 55px;
            margin-top: 0;
            margin-bottom: 0;
            margin-right: 0;
        }

        .judul-surat {
            text-align: center;
            margin: 0;
        }

        .content p {
            margin: 5px 0;
        }

        .content h2 {
            margin-top: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        table th {
            text-align: center;
        }

        footer {
            text-align: right;
            margin-top: 40px;
        }

        .tanda-tangan img {
            width: 150px;
            margin-bottom: 10px;
        }

        .tanda-tangan p {
            margin: 0;
            font-weight: bold;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="kop-surat">
                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/logo-upt.png')); ?>"
                    alt="UPT Komputer STMIK Widya Pratama Pekalongan">
                <div class="judul-kop">
                    <h1>UPT Komputer STMIK Widya Pratama Pekalongan</h1>
                    <p>Jl. Patriot No.25, Dukuh, Kec. Pekalongan Utara, Kota Pekalongan</p>
                    <p>Telp: (0123) 4567890</p>
                    <p>Email: uptkomputer@stmik-wp.ac.id</p>
                </div>
            </div>
            <br>
            <h2 class="judul-surat">Surat Hasil Kegiatan Prakerin</h2>
            <br>
        </header>
        <main>
            <div class="content">
                <p>Widiyono S.T, M.Kom,</p>
                <p>STMIK Widya Pratama Pekalongan,</p>
                <p>Jl. Patriot No.25, Dukuh, Kec. Pekalongan Utara, Kota Pekalongan</p>
                <br>
                <p>Surat Keterangan ini diberikan kepada:</p>
                <br>
                <h2>
                    <?= $nilai['nama_siswa'] ?>
                </h2>
                <br>
                <p>Tempat/Tanggal Lahir:
                    <?= $nilai['tempat_lahir'] ?>,
                    <?= date('d-F-Y', strtotime($nilai['tanggal_lahir'])) ?>
                </p>
                <p>NISN:
                    <?= $nilai['nisn'] ?>
                </p>
                <p>Kelas:
                    <?= $nilai['kelas'] . ' ' . $nilai['jurusan'] ?>
                </p>
                <p>Tanggal Pencabutan:
                    <?= date('d-F-Y', strtotime($nilai['periode_akhir'])) ?>
                </p>
                <br>
                <div class="page-break">
                    <p>Hasil Kegiatan Prakerin:</p>
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Komponen Nilai</th>
                                <th>Nilai</th>
                                <th rowspan="8">Predikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nilai Disiplin</td>
                                <td>
                                    <?= $nilai['disiplin'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nilai Kerja/Motivasi</td>
                                <td>
                                    <?= $nilai['kerja_motivasi'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nilai Kehadiran</td>
                                <td>
                                    <?= $nilai['kehadiran'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Nilai Inisiatif/Kreatif</td>
                                <td>
                                    <?= $nilai['inisiatif_kreatif'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nilai Kejujuran/Tanggung Jawab</td>
                                <td>
                                    <?= $nilai['kejujuran_tanggung_jawab'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Nilai Kesopanan</td>
                                <td>
                                    <?= $nilai['kesopanan'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Nilai Kerjasama</td>
                                <td>
                                    <?= $nilai['kerjasama'] ?>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Rata-rata</th>
                                <th>
                                    <?= $nilai['rata_rata'] ?>
                                </th>
                                <th>
                                    <?= $nilai['predikat'] ?>
                                </th>
                            </tr>
                        </tfoot>
                        <!-- Tambahkan baris sesuai dengan kegiatan prakerin yang telah diikuti -->
                    </table>
                    <br>
                    <p>Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
                </div>
        </main>
        <footer>
            <div class="tanda-tangan">
                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/ttd.png')) ?>"
                    alt="Tanda Tangan">
                <p>Widiyono, S.T, M.Kom</p>
            </div>
            <p>Tanggal:
                <?= date('d-F-Y') ?>
            </p>
        </footer>
    </div>
    </div>
</body>

</html>