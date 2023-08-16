<?php
error_reporting(0); // error ditampilkan
class ClientPemasok
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

    public function tampil_semua_data_pemasok()
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

    public function tampil_data($id_pemasok)
    {
        $id_pemasok = $this->filter($id_pemasok);
        $client = curl_init($this->url . "?aksi=tampil&id_pemasok=" . $id_pemasok);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_pemasok, $client, $response, $data);
    }

    public function tambah_data($data)
    {
        $data = '{  "id_pemasok":"' . $data['id_pemasok'] . '",
                    "nama_pemasok":"' . $data['nama_pemasok'] . '",
                    "jenis_kelamin":"' . $data['jenis_kelamin'] . '",
                    "alamat":"' . $data['alamat'] . '",
                    "no_telp":"' . $data['no_telp'] . '",
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
        $data = '{  "id_pemasok":"' . $data['id_pemasok'] . '",
            "nama_pemasok":"' . $data['nama_pemasok'] . '",
            "jenis_kelamin":"' . $data['jenis_kelamin'] . '",
            "alamat":"' . $data['alamat'] . '",
            "no_telp":"' . $data['no_telp'] . '",
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
        $id_pemasok = $this->filter($data['id_pemasok']);
        $data = '{  "id_pemasok":"' . $id_pemasok . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_pemasok, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    {
        // hapus variable dari memory
        unset($this->url);
    }
}


//nb ini ubah localhost pake ip sesuai dengan ip servernya
$url = '192.168.31.233/Toko-Sepatu-Design-Web-Responsive--master/server/server_api_pemasok.php';
// buat objek baru dari class Client
$abcd = new ClientPemasok($url);