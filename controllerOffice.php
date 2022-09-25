<?php

// include_once("modelOffice.php");

if(!isset($_SESSION["listOffice"])){
    $_SESSION["listOffice"] = array();
}

function tambahOffice(){
    $office = new office();
    $office->namaTempat = $_POST["namaTempat"];
    $office->alamat = $_POST["alamat"];
    $office->kota = $_POST["kota"];
    $office->telepon = $_POST["telepon"];
    array_push($_SESSION["listOffice"],$office);
}

function indexOffice(){
    return $_SESSION["listOffice"];
}

function ambilOffice($id) {
    return indexOffice()[$id];
}

function updateOffice($id) {
    $_SESSION["listOffice"][$id]->setNamaTempat($_POST["namaTempat"]);
    $_SESSION["listOffice"][$id]->setAlamat($_POST["alamat"]);
    $_SESSION["listOffice"][$id]->setKota($_POST["kota"]);
    $_SESSION["listOffice"][$id]->setTelepon($_POST["telepon"]);
}

function deleteOffice($id){

    foreach($_SESSION['listKaryawanOffice'] as $k => $u) {
        if($u->idOffice == $id) {
            unset($_SESSION['listKaryawanOffice'][$k]);
        }
    }

    unset($_SESSION["listOffice"][$id]);
}

?>