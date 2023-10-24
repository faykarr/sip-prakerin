<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Hasil Kegiatan Prakerin</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
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
            border-bottom: 2px ridge #000;
            padding-bottom: 10px;
            margin-bottom: -15px;
            justify-content: center;
        }

        .kop-surat img {
            width: 80px;
            margin-right: 10px;
            align-self: flex-start;
            position: absolute;
            left: 40;
            top: 25;
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
            font-size: 20px;
            margin-bottom: 5px;
        }

        .judul-surat~p {
            margin: 0;
            text-align: center;
            font-weight: bold;
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

        .biodata {
            border: none;
            width: 80%;
        }

        .biodata td {
            border: none;
            padding: 0;
            padding-bottom: 4px;
        }

        .biodata td:nth-child(2) {
            padding-left: -10px;
            padding-right: 10px;
        }

        footer {
            text-align: right;
            margin-top: 40px;
        }

        .tanda-tangan img {
            width: 150px;
            margin-top: -40px;
            margin-bottom: -30px;
            padding: 0px;
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
                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/logo-stmik.png')); ?>"
                    alt="UPT Komputer STMIK Widya Pratama Pekalongan">
                <div class="judul-kop">
                    <h1>Sekolah Tinggi Manajemen Informatika dan Komputer
                        <br />
                        (STMIK) Widya Pratama Pekalongan
                    </h1>
                    <p>Jl. Patriot No.25 Kota Pekalongan Telp: 0285 - 427816</p>
                    <p>Email: akademik@stmik-wp.ac.id</p>
                </div>
            </div>
            <br>
            <h2 class="judul-surat">SURAT KETERANGAN <br> HASIL KEGIATAN PRAKTIK KERJA INDUSTRI</h2>
            <p>Tahun Akademik
                <?= date("Y") . "/" . (date("Y") + 1) ?>
            </p>
            <br>
        </header>
        <main>
            <div class="content">
                <p>Yang bertanda tangan di bawah ini, Kepala Unit Pelaksana Teknis (UPT) Komputer STMIK Widya Pratama
                    Pekalongan, menerangkan
                    bahwa siswa/i dengan nama berikut:</p>
                <br>
                <h2>
                    <?= strtoupper($nilai['nama_siswa']) ?>
                </h2>
                <br>
                <table class="biodata">
                    <tr>
                        <td>
                            NISN
                        </td>
                        <td>:</td>
                        <td>
                            <b>
                                <?= $nilai['nisn'] ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Asal Sekolah
                        </td>
                        <td>:</td>
                        <td>
                            <b>
                                <?= $nilai['nama_sekolah'] ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kelas
                        </td>
                        <td>:</td>
                        <td>
                            <?= $nilai['kelas'] . ' ' . $nilai['jurusan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tempat, Tanggal Lahir
                        </td>
                        <td>:</td>
                        <td>
                            <?= $nilai['tempat_lahir'] ?>,
                            <?= str_replace('-', ' ', date('d-F-Y', strtotime($nilai['tanggal_lahir']))) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tanggal Pencabutan
                        </td>
                        <td>:</td>
                        <td>
                            <?= str_replace('-', ' ', date('d-F-Y', strtotime($nilai['periode_akhir']))) ?>
                        </td>
                    </tr>
                </table>
                <br>
                <p style="text-align: justify; text-indent: 25px;">Nama tersebut diatas adalah benar siswa/i<b>
                        <?= $nilai['nama_sekolah']; ?>
                    </b>yang telah mengikuti kegiatan Praktik Kerja Industri di <b> STMIK Widya Pratama
                        Pekalongan</b> sesuai dengan
                    peraturan & ketentuan yang ada, maka dengan ini kami nyatakan siswa/i tersebut <b>LULUS.</b>
                    Berikut kami lampirkan hasil kegiatan Praktik Kerja Industri sebagai berikut:
                </p>
                <div class="page-break">
                    <p style="margin-left:15px; margin-top:50px;"><b>Hasil Kegiatan Praktik Kerja Industri :</b></p>
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
                                    <?= strtoupper($nilai['predikat']) ?>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    <p>Demikian Surat Keterangan Hasil Kegiatan Praktik Kerja Industri ini dibuat untuk dipergunakan
                        sebagaimana mestinya.</p>
                </div>
        </main>
        <footer>
            <p>Pekalongan,
                <?= date('d F Y', strtotime($nilai['periode_akhir'] . ' +4 day')); ?>
            </p>
            <p style="margin-top: -17px;">Instruktur DU/DI,</p>
            <div class="tanda-tangan">
                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/ttd.png')) ?>"
                    alt="Tanda Tangan">
                <p><u>Widiyono, S.T, M.Kom</u></p>
                <p style="font-size: small">NPPY: 160401.750314.219</p>
            </div>
        </footer>
    </div>
    </div>
</body>

</html>