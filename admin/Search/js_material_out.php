<?php
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

if (isset($_SESSION['date_range']) && empty($startDate) && empty($endDate)) {
    $date_range = $_SESSION['date_range'];
    $startDate = $date_range['startDate'];
    $endDate = $date_range['endDate'];
}

$query_count = "SELECT COUNT(*) as total FROM tb_material_out";
$query = "SELECT * FROM tb_material_out";

if (!empty($startDate) && !empty($endDate)) {
    $query_count .= " WHERE DATE(tgl) BETWEEN '$startDate' AND '$endDate'";
    $query .= " WHERE DATE(tgl) BETWEEN '$startDate' AND '$endDate'";
    $_SESSION['date_range'] = compact('startDate', 'endDate');
}

$query .= " ORDER BY tgl DESC";

$result_count = mysqli_query($koneksi, $query_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_data = $row_count['total'];
$jumlah_data_per_halaman = 3;
$halaman = isset($_GET['halaman']) ? intval($_GET['halaman']) : 1;
$offset = ($halaman - 1) * $jumlah_data_per_halaman;
$jumlah_halaman = ceil($total_data / $jumlah_data_per_halaman);
$query .= " LIMIT $offset, $jumlah_data_per_halaman";

$result = mysqli_query($koneksi, $query);
?>