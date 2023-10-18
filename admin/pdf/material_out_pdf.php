<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak Material Keluar</title>
    <link rel="icon" type="image/png" href="" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        .tab {
        width: 100%;
        border-collapse: collapse;
        }
        .tab th, .tab td {
            border: 1px solid #8b8b8b;
            padding: 8px;
            text-align: center;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            border-bottom: 2px solid #333;
        }
        .table-line {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
        }

        .table-line th {
            background: #ff3b3b;
            color: #FFFFFF;
            padding: 1em;
            text-align: left;
            text-transform: uppercase;
        }

        .table-line td {
            border-bottom: 1px solid #DDDDDD;
            color: #666666;
            padding: 1em;
        }
        .footer {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            width: 170%;
            text-align: center;
            font-size: 14px;
            padding: 10px;
            margin-top: 65px;
        }
    </style>
</head>
<body class="A4 landscape">
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_inventory");

    // Dapatkan tanggal awal dan akhir dari parameter URL
    $startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
    $endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
    
    // Kode untuk mengambil data sesuai dengan tanggal
    $query = "SELECT * FROM tb_material_out";
    if (!empty($startDate) && !empty($endDate)) {
        $query .= " WHERE tgl BETWEEN '$startDate' AND '$endDate'";
    }
    
    $result = mysqli_query($koneksi, $query);

    $i = 1;
    $perPage = 8; // Jumlah data per halaman
    $currentPage = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % $perPage === 1) {
            if ($currentPage > 1) {
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</section>';
            }

            echo '<section class="sheet padding-10mm">';
            echo '<table class="tab">';
            echo '<tr>';
            echo '<td><img src="../../Controller/dist/img/global.png" width="125" height="30" alt=""></td>';
            echo '<td>Data Material Keluar</td>';
            echo '</tr>';
            echo '</table>';
            echo '<br>';
            echo '<table class="table-line">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Tanggal</th>';
            echo '<th>No Req</th>';
            echo '<th>Kode</th>';
            echo '<th>Material</th>';
            echo '<th>Jenis</th>';
            echo '<th>Jumlah</th>';
            echo '<th>Qty</th>';
            echo '<th>Lokasi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $currentPage++;
        }

        echo '<tr>';
        echo '<td>' . $i . '</td>';
        $formattedDate = date('d-m-Y', strtotime($row['tgl']));
        echo '<td>' . $formattedDate . '</td>';
        echo '<td>' . $row['no_req'] . '</td>';
        echo '<td>' . $row['kode_barang'] . '</td>';
        echo '<td>' . $row['material'] . '</td>';
        echo '<td>' . $row['nama_type'] . '</td>';
        echo '<td>' . $row['jml'] . '</td>';
        echo '<td>' . $row['qty'] . '</td>';
        echo '<td>' . $row['lokasi'] . '</td>';
        echo '</tr>';



        $i++;
    }

    if (($i - 1) % $perPage !== 0) {
        echo '</tbody>';
        echo '</table>';
        echo '<div class="footer">';
        echo '<p>PT. Globalnine Indonesia</p><br><br><br>';
        echo '<p>(_______________________)</p>';
        echo '</div>';
        echo '</section>';
    }
    ?>
    	<script>
		window.print();
	</script>
</body>
</html>
