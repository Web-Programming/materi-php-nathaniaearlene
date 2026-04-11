<?php
namespace Kendaraan;
//Cara penulisan class mobil
class Mobil{
    //Cara penulisan property
    public $warna;
    public $merk;
    //cara penulisan method
    function maju () {
        //isi method maju()
        return "Mobil maju";
    }

    function berhenti() {
        //isi method berhenti()
        return "Mobil berhenti";
    }
}

//Cara menggunakan namespace
// use Kendaraan\Mobil;
//membuat inisial namespace
use Kendaraan\Mobil as kMobil;

//inisialisasi object dari namespace alias
$mobil_ahmad = new kMobil();

//inisialisasi object
// $mobil_ahmad = new Mobil();
$mobil_anton = new Mobil();

// set property
$mobil_ahmad->warna = "Hitam";
$mobil_ahmad->merk = "Toyota";

//tampilkan property
echo "Mobil ahnad";
echo "<br>warna: ". $mobil_ahmad->warna;
echo "<br>merk: ". $mobil_ahmad->merk;

//tampilkan method
echo $mobil_ahmad->maju();
echo "<br>";
echo $mobil_ahmad->berenti();
?>

