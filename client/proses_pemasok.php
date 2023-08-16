<?php
include "Client_pemasok.php";

if ($_POST['aksi']=='tambah')
{
    $data = array("id_pemasok"=>$_POST['id_pemasok'], "nama_pemasok"=>$_POST['nama_pemasok'], "jenis_kelamin"=>$_POST['jenis_kelamin'], "alamat"=>$_POST['alamat'], "no_telp"=>$_POST['no_telp'],"aksi"=>$_POST['aksi']);
    $abcd->tambah_data($data);
    header('location:../menu/menu_pemasok.php');
}
elseif ($_POST['aksi']=='ubah')
{
    $data = array("id_pemasok"=>$_POST['id_pemasok'], "nama_pemasok"=>$_POST['nama_pemasok'], "jenis_kelamin"=>$_POST['jenis_kelamin'], "alamat"=>$_POST['alamat'], "no_telp"=>$_POST['no_telp'],"aksi"=>$_POST['aksi']);
    $abcd->ubah_data($data);
    header('location:../menu/menu_pemasok.php');
}
elseif ($_GET['aksi']=='hapus')
{
    $data = array("id_pemasok"=>$_GET['id_pemasok'], "aksi"=>$_GET['aksi']);
    $abcd->hapus_data($data);
    header('location:../menu/menu_pemasok.php');
}
unset($abcd,$data);
?>