<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db_inventory");
if (empty($_SERVER['QUERY_STRING'])) {
    unset($_SESSION['date_range']);
}

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
///////////////////////////////////////////// MENU Satuan
// Simpan Satuan
if(isset($_POST['addsatuan']))
{
    $id         = $_POST['id'];
    $qty        = $_POST['qty'];
    $keterangan = $_POST['keterangan'];

    $check_query = "SELECT COUNT(*) as count FROM tb_satuan WHERE qty = '$id_type'";
    $result = mysqli_query($koneksi, $check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        $response = "warning"; //jika data sama
    } else {
        $add = mysqli_query($koneksi, "insert into tb_satuan (id, qty, keterangan) values('$id', '$qty', '$keterangan')");

        if($add){
            $response = "success";
        } else {
            $response = "Gagal menyimpan data.";
        }
        unset($_SESSION['response']);
    }
    $_SESSION['response'] = $response;
    header('location:satuan_barang.php?response=' . $response);
}
// Update Type
if(isset($_POST['updatesatuan']))
{
    $id         = $_POST['id'];
    $qty        = $_POST['qty'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($koneksi, "update tb_satuan set qty='$qty', keterangan='$keterangan' where id='$id'");
    if($update){
        $response = "update_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:satuan_barang.php?response=' . $response);
    
}
// Hapus Type
if(isset($_POST['hapussatuan']))
{
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi, "delete from tb_satuan where id='$id'");
    if($hapus){
        $response = "hapus_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:satuan_barang.php?response=' . $response);
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
///////////////////////////////////////////// MENU MATERIAL MASUK
// Simpan Material Masuk
if (isset($_POST['addmaterialin'])) {
    $tgl            = $_POST['tgl'];
    $nama_type      = $_POST['nama_type'];
    $kode_barang    = $_POST['kode_barang'];
    $material       = $_POST['material'];
    $no_req         = $_POST['no_req'];
    $jml            = $_POST['jml'];
    $qty            = $_POST['qty'];
    $lokasi         = $_POST['lokasi'];

    // Periksa apakah no_req sudah ada di database
    $check_query = "SELECT COUNT(*) as count FROM tb_material_in WHERE no_req = '$no_req'";
    $check_result = mysqli_query($koneksi, $check_query);
    $check_data = mysqli_fetch_assoc($check_result);

    if ($check_data['count'] > 0) {
        $response = "no_req";
    } else {
        // Lakukan pembaruan stok
        $query = "SELECT jml FROM tb_stok WHERE nama_type = '$nama_type' AND kode_barang = '$kode_barang' AND material = '$material'";
        $result = mysqli_query($koneksi, $query);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            $existing_jml = $row['jml'];
            $new_jml = $existing_jml + $jml;

            $update_query = "UPDATE tb_stok SET jml = '$new_jml' WHERE nama_type = '$nama_type' AND kode_barang = '$kode_barang' AND material = '$material'";
            $update_result = mysqli_query($koneksi, $update_query);

            if ($update_result) {
                $query_material_in = "INSERT INTO tb_material_in (tgl, nama_type, kode_barang, material, no_req, jml, qty, lokasi) 
                                      VALUES ('$tgl', '$nama_type', '$kode_barang', '$material', '$no_req', '$jml', '$qty', '$lokasi')";

                $material_in_result = mysqli_query($koneksi, $query_material_in);

                if ($material_in_result) {
                    $response = "success";
                } else {
                    $response = "Gagal menyimpan data.";
                }
            } else {
                $response = "Gagal menyimpan data.";
            }
        } else {
            $response = "Gagal menyimpan data.";
        }
    }
    $_SESSION['response'] = $response;
    header('location:material_in.php?response=' . $response);
}
// Update Material Masuk
if(isset($_POST['updatematerialin']))
{
    $id            = $_POST['id'];
    $tgl            = $_POST['tgl'];
    $no_req         = $_POST['no_req'];
    $qty            = $_POST['qty'];
    $lokasi         = $_POST['lokasi'];

    $update         = mysqli_query($koneksi, "update tb_material_in set 
    tgl             ='$tgl',
    no_req          ='$no_req',
    qty             ='$qty',
    lokasi          ='$lokasi' where id='$id'");
    if($update){
        $response = "update_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:material_in.php?response=' . $response);
    
}
///////////////////////////////////////////// MENU MATERIAL KELUAR
// Simpan Material Keluar
if (isset($_POST['addmaterialout'])) {
    $tgl            = $_POST['tgl'];
    $nama_type      = $_POST['nama_type'];
    $kode_barang    = $_POST['kode_barang'];
    $material       = $_POST['material'];
    $no_req         = $_POST['no_req'];
    $jml            = $_POST['jml'];
    $qty            = $_POST['qty'];
    $lokasi         = $_POST['lokasi'];

    // Periksa apakah no_req sudah ada di database
    $check_query = "SELECT COUNT(*) as count FROM tb_material_out WHERE no_req = '$no_req'";
    $check_result = mysqli_query($koneksi, $check_query);
    $check_data = mysqli_fetch_assoc($check_result);

    if ($check_data['count'] > 0) {
        $response = "no_req";
    } else {
        // Lakukan pembaruan stok
        $query_stok = "SELECT jml FROM tb_stok WHERE nama_type = '$nama_type' AND kode_barang = '$kode_barang' AND material = '$material'";
        $result_stok = mysqli_query($koneksi, $query_stok);

        if ($result_stok && $row_stok = mysqli_fetch_assoc($result_stok)) {
            $existing_jml = $row_stok['jml'];

            if ($existing_jml < $jml) {
                $response = "stok_habis";
            } else {
                $new_jml = $existing_jml - $jml;

                $update_query = "UPDATE tb_stok SET jml = '$new_jml' WHERE nama_type = '$nama_type' AND kode_barang = '$kode_barang' AND material = '$material'";
                $update_result = mysqli_query($koneksi, $update_query);

                if ($update_result) {
                    $query_material_in = "INSERT INTO tb_material_out (tgl, nama_type, kode_barang, material, no_req, jml, qty, lokasi) 
                                          VALUES ('$tgl', '$nama_type', '$kode_barang', '$material', '$no_req', '$jml', '$qty', '$lokasi')";

                    $material_in_result = mysqli_query($koneksi, $query_material_in);

                    if ($material_in_result) {
                        $response = "success";
                    } else {
                        $response = "Gagal menyimpan data.";
                    }
                } else {
                    $response = "Gagal menyimpan data.";
                }
            }
        } else {
            $response = "Gagal menyimpan data.";
        }
    }
    $_SESSION['response'] = $response;
    header('location:material_out.php?response=' . $response);
}

// Update Material Masuk
if(isset($_POST['updatematerialin']))
{
    $id            = $_POST['id'];
    $tgl            = $_POST['tgl'];
    $no_req         = $_POST['no_req'];
    $qty            = $_POST['qty'];
    $lokasi         = $_POST['lokasi'];

    $update         = mysqli_query($koneksi, "update tb_material_in set 
    tgl             ='$tgl',
    no_req          ='$no_req',
    qty             ='$qty',
    lokasi          ='$lokasi' where id='$id'");
    if($update){
        $response = "update_success";
    } else {
        $response = "Gagal menyimpan data.";
    }
    $_SESSION['response'] = $response;
    header('location:material_in.php?response=' . $response);
    
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
