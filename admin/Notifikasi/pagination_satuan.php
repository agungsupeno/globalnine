<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_inventory");
$dataPerPage = 4;
$currentPage = 1;

$keyword = isset($_GET['qty']) ? $_GET['qty'] : '';

$whereClause = '';
if (!empty($keyword)) {
    $whereClause = "WHERE qty LIKE '%$keyword%'";
}

$totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_satuan $whereClause"));
$totalPages = ceil($totalData / $dataPerPage);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
    if ($currentPage < 1) {
        $currentPage = 1;
    } elseif ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }
} else {
    $currentPage = 1;
}

$offset = ($currentPage - 1) * $dataPerPage;

$query = "SELECT * FROM tb_satuan $whereClause LIMIT $offset, $dataPerPage";
$result = mysqli_query($koneksi, $query);

?>
