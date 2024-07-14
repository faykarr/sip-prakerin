<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Prakerin</title>
    <style>
        body {
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 52px;
            margin-right: 52px;
            padding: 0;
        }

        h1 {
            font-family: 'Bell MT', serif;
            font-weight: bold;
            font-size: 46px;
            text-align: center;
            padding: 0;
            margin: 0;
            margin-top: 10px;
        }

        .address {
            font-family: 'Agency FB', Times, serif;
            font-size: 18px;
            text-align: center;
            padding: 0;
            margin: 0;
        }

        h2 {
            text-align: center;
            font-family: 'Bookman Old Style', Times, serif;
            font-size: 30px;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        .description {
            font-family: 'Agency FB', Times, serif;
            font-size: 26px;
            text-align: center;
            padding: 0;
            margin: 0;
        }

        h3 {
            text-align: center;
            font-family: 'Bookman Old Style', Times, serif;
            font-size: 48px;
            font-weight: bold;
            font-style: italic;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .description_2 {
            font-family: 'Agency FB', Times, serif;
            font-size: 26px;
            text-align: center;
            padding: 0;
            margin: 0;
        }

        .signature {
            font-family: 'Agency FB', Times, serif;
            font-size: 21px;
            text-align: right;
            padding: 0;
            margin: 0;
            margin-top: 32px;
        }

        .ttd {
            position: absolute;
            bottom: 42;
            right: 20;
        }

        .page-break {
            page-break-after: always;
        }

        header>.title-nilai {
            font-family: 'Agency FB';
            font-size: 28px;
            text-align: center;
            text-decoration: none;
            letter-spacing: 1px;
            margin: 0px;
        }

        table {
            font-family: 'Agency FB';
            font-size: 20px;
        }

        .table-nilai {
            width: 100%;
            margin-top: 10px;
            font-family: 'Agency FB';
            font-size: 18px;
            font-weight: bold;
        }

        .table-nilai,
        .table-nilai th,
        .table-nilai td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        /* Make all td in class table-nilai text-center but td in 2nd are not*/
        .table-nilai td {
            text-align: center;
        }

        .table-nilai td:nth-child(2) {
            text-align: left;
            padding-left: 10px;
        }

        .ket-nilai {
            font-family: 'Agency FB';
            font-size: 18px;
            margin-top: -5px;
            margin-left: 50px;
        }

        .ket-nilai-2 {
            font-family: 'Agency FB';
            font-size: 18px;
            position: absolute;
            left: 250;
            bottom: 65;
        }

        .sign {
            font-family: 'Agency FB';
            font-size: 18px;
            position: absolute;
            bottom: 5;
            right: 75;
            text-align: right;
        }

        .ttd-belakang {
            position: absolute;
            bottom: 15;
            right: 55;
            /* width kecilkan sedikit */
            width: 200px;
            /* z-index top */
            z-index: 10;
        }
    </style>
</head>

<body>
    <script type="text/php">
      if ( isset($pdf) ) {
        $w = $pdf->get_width();
        $h = $pdf->get_height();

        // Specify watermark image
        $imageURL = 'assets\static\images\logo\logo-stmik.png';
        $imgWidth = 380;
        $imgHeight = 380;
        
        // Specify horizontal and vertical position
        $x = (($w - $imgWidth) / 2);
        $y = (($h - $imgHeight) / 2);

        // a static object added to every page
        $watermark = $pdf->open_object();

        // Add an image to the pdf
        $pdf->set_opacity(.15);
        $pdf->image($imageURL, $x, $y, $imgWidth, $imgHeight);

        // close & add static object to every page
        $pdf->close_object();
        $pdf->add_object($watermark, "all");
      }
    </script>

    <?php
    // Make function to set huruf nilai
    function set_huruf_nilai($nilai)
    {
        if ($nilai >= 85) {
            return 'A';
        } elseif ($nilai >= 75) {
            return 'B';
        } elseif ($nilai >= 65) {
            return 'C';
        } elseif ($nilai >= 55) {
            return 'D';
        } else {
            return 'E';
        }
    }
    ?>
    <div class="container">
        <div id="sertifikat_depan" class="page-break">
            <h1>
                <?= strtoupper('STMIK Widya Pratama') ?>
            </h1>
            <p class="address">
                Alamat : Jl. Patriot No. 25 Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51146
            </p>
            <hr>
            <h2>
                SERTIFIKAT PRAKERIN
            </h2>
            <p class="description">
                Instruktur IDUKA STMIK Widya Pratama Pekalongan menerangkan bahwa :
            </p>
            <h3>
                <?= $nilai['nama_siswa'] ?>
            </h3>
            <p class="description_2">
                Telah melaksanakan Praktik Kerja Industri (Prakerin) di STMIK Widya Pratama Pekalongan <br>
                Mulai dari tanggal
                <?php setlocale(LC_TIME, 'id_ID.utf8'); ?>
                <?= strftime('%d %B %Y', strtotime($nilai['periode_awal'])) . ' - ' . strftime('%d %B %Y', strtotime($nilai['periode_akhir'])); ?>
            </p>
            <p class="signature">
                Pekalongan,
                <?= date('d F Y', strtotime($nilai['periode_akhir'] . ' +4 day')); ?>, <br>
                Instruktur IDUKA STMIK Widya Pratama <br> <br> <br>

                <b><u>Widiyono, S.T., M.Kom</u></b> <br>
                <b>NPPY 160401.750314.219</b>
            </p>

            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/ttd.png')); ?>"
                alt="Tanda tangan pak widi" class="ttd">
        </div>
        <div id="sertifikat_belakang">
            <header>
                <h2 class="title-nilai">
                    DAFTAR NILAI HASIL PRAKTIK KERJA INDUSTRI <br>
                    <?= strtoupper($nilai['nama_sekolah']); ?>
                </h2>

                <table cellspacing="0">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td style="width:420px;">
                            <?= $nilai['nama_siswa']; ?>
                        </td>
                        <td></td>
                        <td>Tempat Prakerin</td>
                        <td>:</td>
                        <td>STMIK WIDYA PRATAMA PEKALONGAN</td>
                    </tr>
                    <tr>
                        <td>Sekolah</td>
                        <td>:</td>
                        <td colspan="2">
                            <?= $nilai['nama_sekolah']; ?>
                        </td>
                        <td>Periode / Waktu</td>
                        <td>:</td>
                        <td>
                            <?= str_replace('-', ' ', date('d-F-Y', strtotime($nilai['periode_awal']))) ?> -
                            <?= str_replace('-', ' ', date('d-F-Y', strtotime($nilai['periode_akhir']))) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Kompetensi Keahlian</td>
                        <td>:</td>
                        <td colspan="5">
                            <?php
                            if ($nilai['jurusan'] == 'TKJ') {
                                echo 'Teknik Komputer dan Jaringan (TKJ)';
                            } elseif ($nilai['jurusan'] == 'RPL') {
                                echo 'Rekayasa Perangkat Lunak (RPL)';
                            } else {
                                echo 'Multimedia';
                            }
                            ?>
                        </td>
                    </tr>
                </table>

            </header>

            <section>
                <table class="table-nilai">
                    <tr>
                        <th>NO</th>
                        <th>ASPEK / KOMPONEN NILAI</th>
                        <th>NILAI</th>
                        <th>HURUF</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Kedisiplinan</td>
                        <td>
                            <?= $nilai['disiplin']; ?>
                        </td>
                        <td><?= set_huruf_nilai($nilai['disiplin']); ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Etos Kerja & Motivasi</td>
                        <td>
                            <?= $nilai['kerja_motivasi']; ?>
                        </td>
                        <td><?= set_huruf_nilai($nilai['kerja_motivasi']); ?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kehadiran</td>
                        <td>
                            <?= $nilai['kehadiran']; ?>
                        </td>
                        <td><?= set_huruf_nilai($nilai['kehadiran']); ?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Inisiatif & Kreatifitas</td>
                        <td>
                            <?= $nilai['inisiatif_kreatif']; ?>
                        </td>
                        <td><?= set_huruf_nilai($nilai['inisiatif_kreatif']); ?></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Kejujuran & Tanggung Jawab</td>
                        <td>
                            <?= $nilai['kejujuran_tanggung_jawab']; ?>
                        </td>
                        <td><?= set_huruf_nilai($nilai['kejujuran_tanggung_jawab']); ?></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Etika & Kesopanan</td>
                        <td>
                            <?= $nilai['kesopanan']; ?>
                        </td>
                        <td><?= set_huruf_nilai($nilai['kesopanan']); ?></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Kerjasama</td>
                        <td>
                            <?= $nilai['kerjasama']; ?>
                        </td>
                        <td><?= set_huruf_nilai($nilai['kerjasama']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: left; padding-left: 25px;">NILAI RATA-RATA</td>
                        <td colspan="2" style="text-align: center;">
                            <?= $nilai['rata_rata']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: left; padding-left: 25px;">PREDIKAT</td>
                        <td colspan="2" style="text-align: center;">
                            <?= strtoupper($nilai['predikat']) ?>
                        </td>
                    </tr>
                </table>
            </section>

            <footer>
                <div class="ket-nilai">
                    <!-- Keterangan Predikat Huruf Nilai -->
                    <p>
                        <span><b>Keterangan Nilai :</b></span> <br>
                        <span>Huruf A = 85 - 100 (Sempurna)</span> <br>
                        <span>Huruf B = 75 - 84 (Pujian)</span> <br>
                        <span>Huruf C = 65 - 74 (Baik)</span>
                    </p>
                </div>
                <div class="ket-nilai-2">
                    <span>Huruf D = 55 - 64 (Cukup)</span> <br>
                    <span>Huruf E = 0 - 54 (Kurang)</span>
                </div>
                <div class="sign">
                    <p>
                        Pekalongan,
                        <?= date('d F Y', strtotime($nilai['periode_akhir'] . ' +4 day')); ?> <br>
                        Instruktur IDUKA STMIK Widya Pratama <br> <br>

                        <b><u>Widiyono, S.T., M.Kom</u></b> <br>
                        <b>NPPY 160401.750314.219</b>
                    </p>
                </div>

                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/ttd.png')); ?>"
                    alt="Tanda tangan pak widi" class="ttd-belakang">
            </footer>
        </div>
    </div>
</body>

</html>