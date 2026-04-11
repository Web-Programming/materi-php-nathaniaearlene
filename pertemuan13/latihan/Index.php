<?php
require_once "app/produk/Item.php"; //require: panggil file lain
require "app/service/Item.php"; //include: ga ad masalah

//menggunakan alias utk menghindari konflik nama
use App\Produk\Item as ProdukItem;
use App\Service\Item as ServiceItem;

//membuat instance
$produk = new ProdukItem("Laptop");
$service = new ServiceItem("Perbaikan Laptop");

//menampilkan hasil
echo $produk->info()."\n";
echo $service->info();
