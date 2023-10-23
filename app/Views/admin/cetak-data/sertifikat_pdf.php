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
    </style>
</head>

<body>
    <div id="sertifikat_depan">
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

    </div>
</body>

</html>