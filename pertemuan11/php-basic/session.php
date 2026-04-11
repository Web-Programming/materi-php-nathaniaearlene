<?php
session_start();

// Menyimpan session
$_SESSION["nama"] = "Nathania";

// Mengambil session
echo "Nama dari session: " . $_SESSION["nama"];
?>