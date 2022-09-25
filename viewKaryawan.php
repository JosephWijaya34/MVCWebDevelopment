<?php
require("allController.php");
if (isset($_POST['submit'])) {
    tambahKaryawan();
} else if(isset($_POST['edit'])){
    updateKaryawan($_POST['edit']);
}

if (isset($_GET['delete'])) {
    delete($_GET['delete']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Joseph Ganteng Company</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="viewKaryawan.php">Employee</a>
                    <a class="nav-link" href="viewOffice.php">Office</a>
                    <a class="nav-link" href="viewKaryawanOffice.php">Employee - Office</a>
                    <!-- buat disabled <a class="nav-link disabled">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>

    <h1 class="text-center">Data Karyawan</h1>
    <table class="table table-dark mt-2 w-50 mx-auto">
        <thead>
            <tr>
                <th class="col">No</th>
                <th class="col">Nama</th>
                <th class="col">Jabatan</th>
                <th class="col">Usia</th>
                <th class="col">Edit</th>
                <th class="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach (index() as $index => $Karyawan) {
                $i += 1;
                echo "
                <tr>
                    <td>" . $i . "</td>
                    <td>" . $Karyawan->nama . "</td>
                    <td>" . $Karyawan->jabatan . "</td>
                    <td>" . $Karyawan->usia . "</td>
                    <td><a href='viewKaryawan.php?edit=" . $index . "'><button class='btn btn-dark'>Edit</button></a></td>
                    <td><a href='viewKaryawan.php?delete=" . $index . "'><button class='btn btn-dark'>Delete</button></a></td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <div class="shadow p-3 mb-5 bg-body rounded">
        <h1 class="text-center"><?php echo (isset($_GET['edit'])) ? 'Edit' : 'Tambah' ?> Karyawan</h1>
        <form method="post" action="viewKaryawan.php">
            <div class="text-center">
                <div class="form-group text-start w-50 d-inline-block">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" value="<?php echo (isset($_GET['edit'])) ? $_SESSION['listKaryawan'][$_GET['edit']]->nama : '' ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group text-start w-50 d-inline-block">
                    <label for="exampleInputPassword1">Jabatan</label>
                    <input name="jabatan" value="<?php echo (isset($_GET['edit'])) ? $_SESSION['listKaryawan'][$_GET['edit']]->jabatan : '' ?>" type="text" class="form-control" placeholder="Masukkan Jabatan" required>
                </div>
                <div class="form-group text-start w-50 d-inline-block">
                    <label for="exampleInputPassword1">Usia</label>
                    <input name="usia" value="<?php echo (isset($_GET['edit'])) ? $_SESSION['listKaryawan'][$_GET['edit']]->usia : '' ?>" type="number" class="form-control" placeholder="Masukkan Usia" required>
                </div>
                <div>
                    <button name="<?php echo (isset($_GET['edit'])) ? 'edit' : 'submit' ?>" value="<?php echo (isset($_GET['edit'])) ? $_GET['edit'] : '' ?>" type="submit" class="btn d-block mx-auto mt-2 btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
