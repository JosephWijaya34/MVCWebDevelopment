<?php
class office
{
    public $namaTempat;
    public $alamat;
    public $kota;
    public $telepon;

    public function setNamaTempat($namaTempat){
        $this->namaTempat = $namaTempat;
    }

    public function setAlamat($alamat){
        $this->alamat = $alamat;
    }

    public function setKota($kota){
        $this->kota = $kota;
    }

    public function setTelepon($telepon) {
        $this->telepon = $telepon;
    }
}
?>