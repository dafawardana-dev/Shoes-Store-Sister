<?php
include "Client_sepatu.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array("id_sepatu" => $_POST['id_sepatu'], "id_pemasok" => $_POST['id_pemasok'], "nama" => $_POST['nama'], "gambar_sepatu" => $_POST['gambar_sepatu'], "ukuran" => $_POST['ukuran'], "jenis" => $_POST['jenis'], "warna" => $_POST['warna'], "stok" => $_POST['stok'], "harga" => $_POST['harga'], "aksi" => $_POST['aksi']);
    $abc->tambah_data($data);
    header('location:../menu/menu_sepatu.php');
} elseif ($_POST['aksi'] == 'ubah') {
    $data = array("id_sepatu" => $_POST['id_sepatu'], "id_pemasok" => $_POST['id_pemasok'], "nama" => $_POST['nama'], "gambar_sepatu" => $_POST['gambar_sepatu'], "ukuran" => $_POST['ukuran'], "jenis" => $_POST['jenis'], "warna" => $_POST['warna'], "stok" => $_POST['stok'], "harga" => $_POST['harga'], "aksi" => $_POST['aksi']);
    $abc->ubah_data($data);
    header('location:../menu/menu_sepatu.php');
} elseif ($_GET['aksi'] == 'hapus') {
    $data = array("id_sepatu" => $_GET['id_sepatu'], "aksi" => $_GET['aksi']);
    $abc->hapus_data($data);
    header('location:../menu/menu_sepatu.php');
}
unset($abc, $data);
