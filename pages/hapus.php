<?php
include "../config/Library.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $data = new Library;
    $hapus = $data->hapus($id);

    if ($hapus) {
        echo "<script>alert('Berhasil Hapus Data!')</script>";
        header("location:../index.php");
    } else {
        echo "<script>alert('Gagal Hapus Data!')</script>";
    }
}
