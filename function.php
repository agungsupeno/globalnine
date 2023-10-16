<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db_inventory");

//Menghapus Session Response
//if (isset($_SESSION['response'])) {
//    $response = $_SESSION['response'];
//    echo $response;
//    unset($_SESSION['response']); 
//}

///////////////////////////////////////////// MENU LOKASI
// Simpan Lokasi
if(isset($_POST['addlokasi']))
{
    $id         = $_POST['id'];
    $lokasi     = $_POST['lokasi'];

    $check_query = "SELECT COUNT(*) as count FROM tb_lokasi WHERE lokasi = '$lokasi'";
    $result = mysqli_query($koneksi, $check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        $response = "warning"; //jika data sama
    } else {
        $add = mysqli_query($koneksi, "insert into tb_lokasi (id, lokasi) values('$id', '$lokasi')");

        if($add){
            $response = "success";
        } else {
            $response = "Gagal menyimpan data.";
        }
        unset($_SESSION['response']);
    }
    $_SESSION['response'] = $response;
    header('location:lokasi_barang.php?response=' . $response);
}
// Update Lokasi
if(isset($_POST['updatelokasi']))
{
    $id =   $_POST['id'];
    $lokasi = $_POST['lokasi'];

    $update = mysqli_query($koneksi, "update tb_lokasi set lokasi='$lokasi' where id='$id'");
    if($update){
        $response = "update_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:lokasi_barang.php?response=' . $response);
    
}
// Hapus Lokasi
if(isset($_POST['hapuslokasi']))
{
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi, "delete from tb_lokasi where id='$id'");
    if($hapus){
        $response = "hapus_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:lokasi_barang.php?response=' . $response);
}
///////////////////////////////////////////// MENU TYPE
// Simpan Type
if(isset($_POST['addtype']))
{
    $id         = $_POST['id'];
    $id_type    = $_POST['id_type'];
    $nama_type  = $_POST['nama_type'];

    $check_query = "SELECT COUNT(*) as count FROM tb_type WHERE id_type = '$id_type'";
    $result = mysqli_query($koneksi, $check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        $response = "warning"; //jika data sama
    } else {
        $add = mysqli_query($koneksi, "insert into tb_type (id, id_type, nama_type) values('$id', '$id_type', '$nama_type')");

        if($add){
            $response = "success";
        } else {
            $response = "Gagal menyimpan data.";
        }
        unset($_SESSION['response']);
    }
    $_SESSION['response'] = $response;
    header('location:type_barang.php?response=' . $response);
}
// Update Type
if(isset($_POST['updatetype']))
{
    $id         =   $_POST['id'];
    $id_type    =   $_POST['id_type'];
    $nama_type  = $_POST['nama_type'];

    $update = mysqli_query($koneksi, "update tb_type set id_type='$id_type', nama_type='$nama_type' where id='$id'");
    if($update){
        $response = "update_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:type_barang.php?response=' . $response);
    
}
// Hapus Type
if(isset($_POST['hapustype']))
{
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi, "delete from tb_type where id='$id'");
    if($hapus){
        $response = "hapus_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:type_barang.php?response=' . $response);
}
///////////////////////////////////////////// MENU STOK
// Simpan Stok
if(isset($_POST['addstok']))
{
    $id            = $_POST['id'];
    $kode_barang   = $_POST['kode_barang'];
    $material      = $_POST['material'];
    $nama_type     = $_POST['nama_type'];
    $jml           = $_POST['jml'];
    $qty           = $_POST['qty'];
    $lokasi        = $_POST['lokasi'];

    $check_query = "SELECT COUNT(*) as count FROM tb_stok WHERE kode_barang = '$kode_barang'";
    $result = mysqli_query($koneksi, $check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        $response = "warning"; //jika data sama
    } else {
        $add = mysqli_query($koneksi, "insert into tb_stok (id, kode_barang, material, nama_type, jml, qty, lokasi) 
        values('$id', '$kode_barang', '$material', '$nama_type', '$jml', '$qty', '$lokasi')");

        if($add){
            $response = "success";
        } else {
            $response = "Gagal menyimpan data.";
        }
        unset($_SESSION['response']);
    }
    $_SESSION['response'] = $response;
    header('location:stok_barang.php?response=' . $response);
}
// Update Stok
if(isset($_POST['updatestok']))
{
    $id            = $_POST['id'];
    $kode_barang   = $_POST['kode_barang'];
    $material      = $_POST['material'];
    $nama_type     = $_POST['nama_type'];
    $jml           = $_POST['jml'];
    $qty           = $_POST['qty'];
    $lokasi        = $_POST['lokasi'];

    $update         = mysqli_query($koneksi, "update tb_stok set 
    kode_barang     ='$kode_barang',
    material        ='$material',
    nama_type       ='$nama_type',
    jml             ='$jml',
    qty             ='$qty',
    lokasi          ='$lokasi' where id='$id'");
    if($update){
        $response = "update_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:stok_barang.php?response=' . $response);
    
}
// Hapus Stok
if(isset($_POST['hapusstok']))
{
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi, "delete from tb_stok where id='$id'");
    if($hapus){
        $response = "hapus_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:stok_barang.php?response=' . $response);
}



















///////////////////////////////////////////// MENU USER
//Simpan User
if(isset($_POST['adduser']))
{
    $id         = $_POST['id'];
    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $jabatan    = $_POST['jabatan'];
    $password   = md5($_POST['password']);
    $level      = $_POST['level'];

    $check_query = "SELECT COUNT(*) as count FROM user WHERE nik = '$nik'";
    $result = mysqli_query($koneksi, $check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        $response = "warning"; //jika data sama
    } else {
        $add = mysqli_query($koneksi, "insert into user (id, nik, nama, jabatan, password, level) 
        values('$id', '$nik', '$nama', '$jabatan', '$password', '$level')");

        if($add){
            $response = "success";
        } else {
            $response = "Gagal menyimpan data.";
        }
    }
    $_SESSION['response'] = $response;
    header('location:user.php?response=' . $response);
}

?>
