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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel sed quae odit quam, deserunt necessitatibus
                perspiciatis recusandae voluptatibus, maxime minus molestiae rerum quas cumque doloremque qui, nisi iure
                non consequatur illum? Nobis enim possimus quod alias! Corporis aut voluptas cumque, mollitia rerum
                delectus eaque totam ipsam tempore ipsum ad harum, dolorum consectetur vero tenetur! Exercitationem
                minus totam laudantium delectus quae facere eveniet dolor beatae deserunt adipisci nihil impedit
                accusamus eius, voluptate in rem provident numquam temporibus. Iusto accusantium dolor doloremque, non
                deleniti commodi optio quod, suscipit quis repudiandae architecto hic quidem odio sit quaerat. Ad ex
                accusantium ut optio illum.</p>
        </div>
    </div>
</body>

</html>