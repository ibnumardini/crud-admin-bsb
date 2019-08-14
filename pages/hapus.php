<?php
include "../config/Library.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $data = new Library;
    $hapus = $data->hapus($id);

    if ($hapus) {
        header("Location:../index.php?succes");
    }
}
