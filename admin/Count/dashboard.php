<?php
function hitungTotal($koneksi, $tabel) {
    $query = "SELECT COUNT(*) as total FROM $tabel";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        return "Gagal mengambil data";
    }
}

$total_stok = hitungTotal($koneksi, 'tb_stok');
$total_user = hitungTotal($koneksi, 'user');
$total_in = hitungTotal($koneksi, 'tb_material_in');
$total_out = hitungTotal($koneksi, 'tb_material_out');
mysqli_close($koneksi);
?>