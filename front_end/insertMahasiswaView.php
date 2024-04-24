<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container-fluid">
        <h2 class="mt-4">Tambah Nilai Mahasiswa</h2>
        <form action="insertMahasiswaDo.php" method="POST">
            <div class="form-group">
                <label for="nim">NIM Mahasiswa:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $_GET['nim']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="kode_mk">Kode Mata Kuliah:</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="number" class="form-control" id="nilai" name="nilai" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    </div>
</body>
</html>