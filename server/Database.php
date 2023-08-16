<?php
class Database
{
    private $host = "localhost";
    private $dbname = "toko_sepatu";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $conn;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct()
    {
        // koneksi database
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Koneksi gagal";
        }
    }

    public function tampil_semua_data_sepatu()
    {
        $query = $this->conn->prepare("select id_sepatu, id_pemasok, nama, gambar_sepatu, ukuran, jenis, warna, stok, harga from sepatu order by id_sepatu");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // mengembalikan data
        return $data;
        // hapus variable memory
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data_sepatu_dengan_nama_pemasok()
    {
        $query = $this->conn->prepare("select id_sepatu, nama_pemasok, nama, gambar_sepatu, ukuran, jenis, warna, stok, harga from sepatu,pemasok where sepatu.id_pemasok = pemasok.id_pemasok order by id_sepatu");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // mengembalikan data
        return $data;
        // hapus variable memory
        $query->closeCursor();
        unset($data);
    }

    public function tampil_semua_data_pemasok()
    {
        $query2 = $this->conn->prepare("select id_pemasok, nama_pemasok, jenis_kelamin, alamat, no_telp from pemasok order by id_pemasok");
        $query2->execute();
        // mengambil banyak data dengan fetchAll
        $data2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        // mengembalikan data
        return $data2;
        // hapus variable memory
        $query2->closeCursor();
        unset($data2);
    }

    public function tampil_data_sepatu($id_sepatu)
    {
        $query = $this->conn->prepare("select id_sepatu, id_pemasok, nama, gambar_sepatu, ukuran, jenis, warna, stok, harga from sepatu where id_sepatu=?");
        $query->execute(array($id_sepatu));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($id_sepatu, $data);
    }
    public function tampil_data_pemasok($id_pemasok)
    {
        $query2 = $this->conn->prepare("select id_pemasok, nama_pemasok, jenis_kelamin, alamat, no_telp from pemasok where id_pemasok=?");
        $query2->execute(array($id_pemasok));
        // mengambil satu data dengan fetch
        $data2 = $query2->fetch(PDO::FETCH_ASSOC);
        return $data2;
        $query2->closeCursor();
        unset($id_pemasok, $data2);
    }

    public function tambah_data_sepatu($data)
    {
        $query = $this->conn->prepare("insert ignore into sepatu (id_sepatu, id_pemasok, nama, gambar_sepatu, ukuran, jenis, warna, stok, harga) values (?,?,?,?,?,?,?,?,?)");
        $query->execute(array($data['id_sepatu'], $data['id_pemasok'], $data['nama'], $data['gambar_sepatu'], $data['ukuran'], $data['jenis'], $data['warna'], $data['stok'], $data['harga']));
        $query->closeCursor();
        unset($data);
    }
    public function tambah_data_pemasok($data2)
    {
        $query2 = $this->conn->prepare("insert ignore into pemasok (id_pemasok, nama_pemasok, jenis_kelamin, alamat, no_telp) values (?,?,?,?,?)");
        $query2->execute(array($data2['id_pemasok'], $data2['nama_pemasok'], $data2['jenis_kelamin'], $data2['alamat'], $data2['no_telp']));
        $query2->closeCursor();
        unset($data);
    }

    public function ubah_data_sepatu($data)
    {
        $query = $this->conn->prepare("update sepatu set id_pemasok=?, nama=?, gambar_sepatu=?, ukuran=?, jenis=?, warna=?, stok=?, harga=? where id_sepatu=?");
        $query->execute(array($data['id_pemasok'], $data['nama'], $data['gambar_sepatu'], $data['ukuran'], $data['jenis'], $data['warna'], $data['stok'], $data['harga'], $data['id_sepatu']));
        $query->closeCursor();
        unset($data);
    }
    public function ubah_data_pemasok($data2)
    {
        $query2 = $this->conn->prepare("update pemasok set id_pemasok=?, nama_pemasok=?, jenis_kelamin=?, alamat=?, no_telp=? where id_pemasok=?");
        $query2->execute(array($data2['id_pemasok'], $data2['nama_pemasok'], $data2['jenis_kelamin'], $data2['alamat'], $data2['no_telp'], $data2['id_pemasok']));
        $query2->closeCursor();
        unset($data2);
    }

    public function hapus_data_sepatu($id_sepatu)
    {
        $query = $this->conn->prepare("delete from sepatu where id_sepatu=?");
        $query->execute(array($id_sepatu));
        $query->closeCursor();
        unset($id_sepatu);
    }
    public function hapus_data_pemasok($id_pemasok)
    {
        $query2 = $this->conn->prepare("delete from pemasok where id_pemasok=?");
        $query2->execute(array($id_pemasok));
        $query2->closeCursor();
        unset($id_pemasok);
    }
}
