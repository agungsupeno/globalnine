<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_inventory");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama_type'])) {
    $namaType = $_POST['nama_type'];

    $query_kode_barang = "SELECT DISTINCT kode_barang, material FROM tb_stok WHERE nama_type = '$namaType'";
    $result_kode_barang = mysqli_query($koneksi, $query_kode_barang);

    if ($result_kode_barang) {
        $kodeBarangOptions = '';
        while ($stokData = mysqli_fetch_assoc($result_kode_barang)) {
            $kodeBarang = $stokData['kode_barang'];
            $material = $stokData['material'];
            
            $kodeBarangOptions .= '<option value="' . $kodeBarang . '" data-material="' . $material . '">' . $kodeBarang . '</option>';
        }
        echo $kodeBarangOptions;
    } else {
        error_log(mysqli_error($koneksi));
        echo '<option value="">Tidak ada kode barang yang sesuai.</option>';
    }
}
?>
