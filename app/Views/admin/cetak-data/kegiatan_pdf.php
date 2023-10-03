<!DOCTYPE html>
<html>

<head>
    <title>Laporan Bulanan Kegiatan Prakerin</title>
    <style>
        /* Tambahkan gaya CSS untuk tampilan PDF */
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px ridge #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        header {
            display: flex;
            flex-wrap: nowrap;
        }

        h1 {
            text-align: center;
            flex: 1;
            margin-top: -65px;
            font-size: 20px;
        }

        h2 {
            /* margin-top: -100px; */
            text-align: left;
            font-size: 21px;
        }

        p {
            text-align: right;
        }

        .image {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>

<body>
    <header>
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/logo-stmik.png')); ?>"
            alt="Logo UPTKOMP" width="84px">
        <h1>Sekolah Tinggi Manajemen Informatika dan Komputer
            <br>(STMIK) Widya Pratama Pekalongan
            <br>Unit Pelaksana Teknis (UPT) Komputer
        </h1>

    </header>
    <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('assets/static/images/logo/logo-upt.png')); ?>"
        alt="Logo UPTKOMP" width="84px" class="image">
    <hr>
    <div class="title">
        <h2>Laporan Bulanan Kegiatan Prakerin</h2>
        <?php if ($start_date && $end_date): ?>
            <p style="margin-top: -40px;">Periode:
                <?= date('d F Y', strtotime($start_date)) . ' - ' . date('d F Y', strtotime($end_date)); ?>
            </p>
        <?php else: ?>
            <p style="margin-top: -40px;">Periode:
                <?= date('F Y'); ?>
            </p>
        <?php endif; ?>
    </div>
    <table>
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th>Nama Asisten</th>
                <th>Asisten Pembantu</th>
                <th width="10%">Tanggal</th>
                <th width="10%">Jam</th>
                <th>Ruang Lab</th>
                <th>Detail Kegiatan</th>
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
                        <?= $k['nama_asisten']; ?>
                    </td>
                    <td>
                        <?= $k['asisten_pembantu']; ?>
                    </td>
                    <td>
                        <?= date('d-m-Y', strtotime($k['tanggal'])); ?>
                    </td>
                    <td>
                        <?= date('H:i', strtotime($k['waktu'])) . ' WIB'; ?>
                    </td>
                    <td>
                        <?= $k['ruang_lab']; ?>
                    </td>
                    <td>
                        <?= $k['detail_kegiatan']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>