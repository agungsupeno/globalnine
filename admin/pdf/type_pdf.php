<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak Type Barang</title>
    <link rel="icon" type="image/png" href="" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @page { size: A4 }
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
            background: #246dff;
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
    </style>
</head>
<body class="A4 landscape">
    <section class="sheet padding-10mm">
        <table class="tab">
            <tr>
                <td><img src="../../Controller/dist/img/global.png" width="125" height="30" alt=""></td>
                <td>Data Type Barang</td>
            </tr>
        </table> <br>
        <table class="table-line">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "db_inventory");
                
                // Dapatkan kata kunci pencarian dari URL
                $keyword = isset($_GET['nama_type']) ? $_GET['nama_type'] : '';

                // Gunakan kata kunci dalam kueri SQL
                $query = "SELECT * FROM tb_type";
                if ($keyword) {
                    $query = "SELECT * FROM tb_type WHERE nama_type LIKE '%$keyword%'";
                }
                
                $result = mysqli_query($koneksi, $query);

                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $i++ . '</td>';
                    echo '<td>' . $row['id_type'] . '</td>';
                    echo '<td>' . $row['nama_type'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
