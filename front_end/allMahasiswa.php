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
                        <h2 class="pull-left">Data Semua Mahasiswa</h2>
                        <h5 class="pull-left">Anda dapat menambahkan nilai dengan menekan tombol plus</h5>
                        <br>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_uts/dataSemuaMahasiswaApi.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Nim</th>";
                                        echo "<th>Nama</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($json["data"] as $data) {
                                    echo "<tr>";
                                    echo "<td>" . (isset($data["nim"]) ? $data["nim"] : "") . "</td>";
                                    echo "<td>" . (isset($data["nama"]) ? $data["nama"] : "") . "</td>";
                                    echo "<td>";
                                    echo '<a href="insertMahasiswaView.php?nim=' . (isset($data["nim"]) ? $data["nim"] : "") . '" class="mr-3" title="Add new Nilai" data-toggle="tooltip"><span class="fa fa-plus"></span></a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
                <a href="index.php" class="btn btn-danger pull-right"><i></i> Back</a>
            </div>        
        </div>
    </div>

    <p><p><p>
    
   
</body>
</html>