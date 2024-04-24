<?php
require_once "config.php";
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':     
        if(!empty($_GET["nim"]))
        {
        $nim=($_GET["nim"]);

        }
        else
        {
        get_all_mhs();
        }
        break;
         default:
         // Invalid Request Method
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }

    function get_all_mhs()
   {
    global $mysqli;
    $query = "SELECT nim, nama, alamat FROM mahasiswa";

    $data = array();
    $result = $mysqli->query($query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        $response = array(
            'status' => 1,
            'message' => 'Get All Mahasiswa Data Successfully.',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'No mahasiswa data found.'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
   }
