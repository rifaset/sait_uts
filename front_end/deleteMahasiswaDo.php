<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nim']) && isset($_GET['kode_mk'])) {
    // Ambil data nim dan kode_mk dari query string
    $nim = $_GET['nim'];
    $kode_mk = $_GET['kode_mk'];

    // URL endpoint API untuk menghapus data
    $api_url = 'http://localhost/sait_uts/mahasiswaApi.php?nim=' . $nim . '&kode_mk=' . $kode_mk;

    // Konfigurasi curl untuk mengirim permintaan DELETE ke API
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Eksekusi curl dan tangkap responsenya
    $response = curl_exec($curl);

    // Cek apakah request berhasil atau tidak
    if ($response === false) {
        echo json_encode(array("status" => 0, "message" => "Failed to send delete request to API"));
    } else {
        // Konversi respons dari API menjadi array
        $result = json_decode($response, true);
        // Tampilkan pesan dari API
        echo json_encode($result);
        echo "<br><a href=index.php> Kembali </a>";
    }

    // Tutup curl
    curl_close($curl);
} else {
    // Jika bukan metode GET atau parameter nim dan kode_mk tidak disertakan, beri respons Bad Request
    header("HTTP/1.0 400 Bad Request");
    echo json_encode(array("status" => 0, "message" => "Invalid request or missing parameters"));
}

?>
