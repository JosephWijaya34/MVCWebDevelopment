<?php
require("allController.php");

if (isset($_POST['submit'])) {
    tambahKaryawanOffice();
} else if (isset($_POST['edit'])) {
    updateKaryawanOffice($_POST['edit']);
}

if (isset($_GET['delete'])) {
    deleteKaryawanOffice($_GET['delete']);
}

?>

<!DOCTYPE html>
<html lang="en">

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Karyawan - Office</title>
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

    <h1 class="text-center">Data Karyawan - Office</h1>
    <table class="table table-dark mt-2 w-50 mx-auto">
        <thead>
            <tr>
                <th class="col">No</th>
                <th class="col">Nama</th>
                <th class="col">Jabatan</th>
                <th class="col">Usia</th>
                <th class="col">Nama Kantor</th>
                <th class="col">Alamat</th>
                <th class="col">Kota</th>
                <th class="col">Nomer Telepon</th>
                <th class="col">Edit</th>
                <th class="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach (indexKaryawanOffice() as $index => $karyawanOffice) : ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= ambilKaryawan($karyawanOffice->idKaryawan)->nama ?></td>
                    <td><?= ambilKaryawan($karyawanOffice->idKaryawan)->jabatan ?></td>
                    <td><?= ambilKaryawan($karyawanOffice->idKaryawan)->usia ?></td>
                    <td><?= ambilOffice($karyawanOffice->idOffice)->namaTempat ?></td>
                    <td><?= ambilOffice($karyawanOffice->idOffice)->alamat ?></td>
                    <td><?= ambilOffice($karyawanOffice->idOffice)->kota ?></td>
                    <td><?= ambilOffice($karyawanOffice->idOffice)->telepon ?></td>
                    <td><a href='viewKaryawanOffice.php?edit=<?= $index ?>'><button class='btn btn-dark'>Edit</button></a></td>
                    <td><a href='viewKaryawanOffice.php?delete=<?= $index ?>'><button class='btn btn-dark'>Delete</button></a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <form class="row m-5" method="POST" action="viewKaryawanOffice.php">
        <div class="text-center">
            <div class="form-group text-center w-50 d-inline-block">
                <label for="karyawan" class="form-label">Karyawan</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="idKaryawan" required>

                    <?php if (index() == null) : ?>
                        <option value="">Data Employee Belum Ada</option>
                    <?php elseif (index() != null) : ?>
                        <option value="<?php echo (isset($_GET['edit'])) ? ambilKaryawanOffice($_GET['edit'])->idKaryawan : '' ?>"><?php echo isset($_GET['edit']) ? ambilKaryawan(ambilKaryawanOffice($_GET['edit'])->idKaryawan)->nama : 'Pilih Karyawan' ?></option>
                    <?php endif; ?>

                    <?php foreach (index() as $k => $karyawan) :
                        if ($karyawan->nama == ambilKaryawan(ambilKaryawanOffice($_GET['edit'])->idKaryawan)->nama) {
                            continue;
                        } else {
                    ?>
                            <option value="<?= $k ?>"><?= $karyawan->nama ?></option>
                    <?php }
                    endforeach; ?>
                </select>
            </div>

            <div class="form-group text-center w-50 d-inline-block">
                <label for="office" class="form-label">Office</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="idOffice" required>

                    <?php if (indexOffice() == null) : ?>
                        <option value="">Data Employee Belum Ada</option>
                    <?php elseif (indexOffice() != null) : ?>
                        <option value="<?php echo (isset($_GET['edit'])) ? ambilKaryawanOffice($_GET['edit'])->idOffice : '' ?>"><?php echo isset($_GET['edit']) ? ambilOffice(ambilKaryawanOffice($_GET['edit'])->idOffice)->namaTempat : 'Pilih Office' ?></option>
                    <?php endif; ?>

                    <?php foreach (indexOffice() as $o => $office) :
                        if ($office->namaTempat == ambilOffice(ambilKaryawanOffice($_GET['edit'])->idOffice)->namaTempat) {
                        } else {
                    ?>
                            <option value="<?= $o ?>"><?= $office->namaTempat ?></option>
                    <?php }
                    endforeach; ?>
                </select>
            </div>
        </div>

        <button name="<?php echo (isset($_GET['edit'])) ? 'edit' : 'submit' ?>" value="<?php echo (isset($_GET['edit'])) ? $_GET['edit'] : '' ?>" type="submit" class="d-block mx-auto mt-2 btn-sm btn btn-primary w-50">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<!-- Foreach show karyawan office -->
<!-- // foreach (index() as $k => $karyawan) {
                    //     echo "<option value='$k->nama'>";
                    //     echo $k->nama;
                    //     echo "</option>";
                    // echo "<input type='hidden' name='kota' value='$o->kota' hidden>";
                    // echo "</input>";
                    // } -->
<!-- 
// foreach (indexOffice() as $o => $office) {
                    //     echo "<option value='$o->namaTempat'>";
                    //     echo $o->namaTempat;
                    //     echo "</option>";
                    //     // echo "<input type='hidden' name='kota' value='$o->kota' hidden>";
                    //     // echo "</input>";
                    // } -->

<!-- 
            $i = 0;
        
            foreach (indexKaryawanOffice() as $index => $karyawanOffice) {
                // $i += 1;
                // echo "
                // <tr>
                //     <td>" . $i . "</td>
                //     <td>" . ambilKaryawan($karyawanOffice->idKaryawan)->nama . "</td>
                //     <td>" .  . "</td>
                //     <td><a href='viewKaryawanOffice.php?delete=" . $index . "'><button class='btn btn-dark'>Delete</button></a></td>
                // </tr>
                // ";
            } -->