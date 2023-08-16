<?php
error_reporting(0); // error ditampilkan
class ClientSepatu
{
    private $url;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    // function untuk menghapus selain huruf dan angka
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function tampil_semua_data_sepatu()
    {
        $client = curl_init($this->url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data
        return $data;
        // menghapus variabel dari memory
        unset($data, $client, $response);
    }
    public function tampil_data_sepatu_dengan_nama_pemasok()
    {
        $client = curl_init($this->url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data
        return $data;
        // menghapus variabel dari memory
        unset($data, $client, $response);
    }

    public function tampil_data($id_sepatu)
    {
        $id_sepatu = $this->filter($id_sepatu);
        $client = curl_init($this->url . "?aksi=tampil&id_sepatu=" . $id_sepatu);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_sepatu, $client, $response, $data);
    }

    public function tambah_data($data)
    {
        $data = '{  "id_sepatu":"' . $data['id_sepatu'] . '",
            "id_pemasok":"' . $data['id_pemasok'] . '",
            "nama":"' . $data['nama'] . '",
            "gambar_sepatu":"' . $data['gambar_sepatu'] . '",
            "ukuran":"' . $data['ukuran'] . '",
            "jenis":"' . $data['jenis'] . '",
            "warna":"' . $data['warna'] . '",
            "stok":"' . $data['stok'] . '",
            "harga":"' . $data['harga'] . '",                    
            "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_data($data)
    {
        $data = '{  "id_sepatu":"' . $data['id_sepatu'] . '",
                    "id_pemasok":"' . $data['id_pemasok'] . '",
                    "nama":"' . $data['nama'] . '",
                    "gambar_sepatu":"' . $data['gambar_sepatu'] . '",
                    "ukuran":"' . $data['ukuran'] . '",
                    "jenis":"' . $data['jenis'] . '",
                    "warna":"' . $data['warna'] . '",
                    "stok":"' . $data['stok'] . '",
                    "harga":"' . $data['harga'] . '",                    
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_data($data)
    {
        $id_sepatu = $this->filter($data['id_sepatu']);
        $data = '{  "id_sepatu":"' . $id_sepatu . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_sepatu, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    {
        // hapus variable dari memory
        unset($this->url);
    }
}


//nb ini ubah localhost pake ip sesuai dengan ip servernya
$url = '192.168.31.233/Toko-Sepatu-Design-Web-Responsive--master/server/server_api_sepatu.php';
// buat objek baru dari class Client
$abc = new ClientSepatu($url);