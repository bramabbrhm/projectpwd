<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['admin'])) {
    header("Location: loginadmin.php");
    exit();
}

$id = $_GET['id_menu'];
mysqli_query($connect, "DELETE FROM menu WHERE id_menu = $id");
header("Location: admin_menu.php");
?>
