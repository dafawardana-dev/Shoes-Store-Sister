<?php
error_reporting(1); // error ditampilkan
include "Database.php";
// buat objek baru dari class Database
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

$postdata = file_get_contents("php://input");

// function untuk menghapus selain huruf dan angka
function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_sepatu = $data->id_sepatu;
    $id_pemasok = $data->id_pemasok;
    $nama = $data->nama;
    $gambar_sepatu = $data->gambar_sepatu;
    $ukuran = $data->ukuran;
    $jenis = $data->jenis;
    $warna = $data->warna;
    $stok = $data->stok;
    $harga = $data->harga;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array('id_sepatu' => $id_sepatu, 'id_pemasok' => $id_pemasok, 'nama' => $nama, 'gambar_sepatu' => $gambar_sepatu, 'ukuran' => $ukuran, 'jenis' => $jenis, 'warna' => $warna, 'stok' => $stok, 'harga' => $harga);
        $abc->tambah_data_sepatu($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array('id_sepatu' => $id_sepatu, 'id_pemasok' => $id_pemasok, 'nama' => $nama, 'gambar_sepatu' => $gambar_sepatu, 'ukuran' => $ukuran, 'jenis' => $jenis, 'warna' => $warna, 'stok' => $stok, 'harga' => $harga);
        $abc->ubah_data_sepatu($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_data_sepatu($id_sepatu);
    }
    // hapus variable dari memory
    unset($postdata, $data, $data2, $id_sepatu, $nama, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_sepatu']))) {
        $id_sepatu = filter($_GET['id_sepatu']);
        $data = $abc->tampil_data_sepatu($id_sepatu);
        echo json_encode($data);
    } else // menampilkan semua data
    {
        $data = $abc->tampil_data_sepatu_dengan_nama_pemasok();
        echo json_encode($data);
    }

    unset($postdata, $data, $id_sepatu, $abc);
}