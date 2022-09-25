<?php
// include_once("modelKaryawan.php");
// include_once("modelOffice.php");
// include_once("modelKaryawanOffice.php");

if(!isset($_SESSION["listKaryawanOffice"])){
    $_SESSION["listKaryawanOffice"] = array();
}
function tambahKaryawanOffice(){
    $karyawanOffice = new KaryawanOffice();
    $karyawanOffice->idKaryawan = $_POST["idKaryawan"];
    $karyawanOffice->idOffice = $_POST["idOffice"];
    array_push($_SESSION["listKaryawanOffice"],$karyawanOffice);
}


function indexKaryawanOffice(){
    return $_SESSION["listKaryawanOffice"];
}

function ambilKaryawanOffice($id) {
    return indexKaryawanOffice()[$id];
}

function updateKaryawanOffice($id){
    $_SESSION["listKaryawanOffice"][$id]->setIdKaryawan($_POST["idKaryawan"]);
    $_SESSION["listKaryawanOffice"][$id]->setIdOffice($_POST["idOffice"]);
}

function deleteKaryawanOffice($id){
    unset($_SESSION["listKaryawanOffice"][$id]);
}

?>