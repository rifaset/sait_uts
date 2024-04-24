<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nim']) && isset($_POST['kode_mk']) && isset($_POST['nilai'])) {
    // Ambil data nim, kode_mk, dan nilai dari form POST
    $nim = $_POST['nim'];
    $kode_mk = $_POST['kode_mk'];
    $nilai = $_POST['nilai'];

    // URL endpoint API untuk mengupdate data
    $api_url = 'http://localhost/sait_uts/mahasiswaApi.php?nim=' . urlencode($nim) . '&kode_mk=' . urlencode($kode_mk);

    // Data yang akan dikirim dalam body request
    $data = array(
        'nilai' => $nilai
        // Include other fields if necessary for updating
    );

    // Inisialisasi CURL
    $curl = curl_init();

    // Set konfigurasi CURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));

    // Eksekusi CURL dan tangkap responsenya
    $response = curl_exec($curl);

    // Tangani kesalahan jika terjadi
    if ($response === false) {
        echo json_encode(array("status" => 0, "message" => "Failed to send update request to API"));
    } else {
        // Konversi respons dari API menjadi array
        $result = json_decode($response, true);
        // Tampilkan pesan dari API
        echo json_encode($result);
        echo "<br><a href=index.php> Kembali </a>";
    }

    // Tutup CURL
    curl_close($curl);
} else {
    // Jika bukan metode POST atau parameter nim, kode_mk, atau nilai tidak disertakan, beri respons Bad Request
    header("HTTP/1.0 400 Bad Request");
    echo json_encode(array("status" => 0, "message" => "Invalid request or missing parameters"));
}
?>
