<?php

// include_once("modelKaryawan.php");
if(!isset($_SESSION["listKaryawan"])){
    $_SESSION["listKaryawan"] = array();
}

function tambahKaryawan(){
    $karyawan = new Karyawan();
    $karyawan->nama = $_POST["nama"];
    $karyawan->jabatan = $_POST["jabatan"];
    $karyawan->usia = $_POST["usia"];
    array_push($_SESSION["listKaryawan"],$karyawan);
}

function index(){
    
    return $_SESSION["listKaryawan"];
}

function ambilKaryawan($id) {
    return index()[$id];
}

function updateKaryawan($id){
    $_SESSION["listKaryawan"][$id]->setNama($_POST["nama"]);
    $_SESSION["listKaryawan"][$id]->setJabatan($_POST["jabatan"]);
    $_SESSION["listKaryawan"][$id]->setUsia($_POST["usia"]);
}

function delete($id){

    foreach($_SESSION['listKaryawanOffice'] as $k => $u) {
        if($u->idKaryawan == $id) {
            unset($_SESSION['listKaryawanOffice'][$k]);
        }
    }

    unset($_SESSION["listKaryawan"][$id]);
}

?>