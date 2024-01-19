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
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>Eka Adhi Purnomo</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>Eka Adhi Purnomo</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>Eka Adhi Purnomo</td>
                    </tr>
                </table>
            </header>
        </div>
    </div>
</body>

</html>