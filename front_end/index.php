<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <style>
        div.scroll {

        width: 600px;
        height: 400px;
        overflow: scroll;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Nilai Mahasiswa</h2>
                        <a href="allMahasiswa.php" class="btn btn-outline-success mr-3 pull-right"><i class="fa solid fa-user"></i> See All Data</a>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_uts/mahasiswaApi.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Nim</th>";
                                        echo "<th>Nama</th>";
                                        echo "<th>Alamat</th>";
                                        echo "<th>Mata Kuliah</th>";
                                        echo "<th>Nilai</th>";
                                        echo "<th>Aksi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($json["data"] as $data) {
                                    echo "<tr>";
                                    echo "<td>" . (isset($data["nim"]) ? $data["nim"] : "") . "</td>";
                                    echo "<td>" . (isset($data["nama"]) ? $data["nama"] : "") . "</td>";
                                    echo "<td>" . (isset($data["alamat"]) ? $data["alamat"] : "") . "</td>";
                                    echo "<td>" . (isset($data["nama_mk"]) ? $data["nama_mk"] : "") . "</td>";
                                    echo "<td>" . (isset($data["nilai"]) ? $data["nilai"] : "") . "</td>";
                                    echo "<td>";
                                    //echo '<a href="updateMahasiswaView.php?id=' . (isset($data["id"]) ? $data["id"] : "") . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                    echo '<a class="mr-3" href="updateMahasiswaView.php?nim=' . (isset($data["nim"]) ? $data["nim"] : "") . '&kode_mk=' . (isset($data["kode_mk"]) ? $data["kode_mk"] : "") . '  " title="Update Nilai" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                    echo '<a href="deleteMahasiswaDo.php?nim=' . (isset($data["nim"]) ? $data["nim"] : "") . '&kode_mk=' . (isset($data["kode_mk"]) ? $data["kode_mk"] : "") . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>

    <p><p><p>
    
   
</body>
</html>