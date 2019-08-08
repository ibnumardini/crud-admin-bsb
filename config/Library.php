<?php

class Library
{

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=santriQodr', "root", "");
    }

    public function tampil()
    {
        $sql = "SELECT * FROM santri ORDER BY id_santri DESC";
        $query = $this->db->query($sql);
        return $query;
    }

    public function tambah($nama, $alamat, $jurusan)
    {
        $sql = "INSERT INTO santri(nama,alamat,jurusan) VALUES('$nama','$alamat','$jurusan')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function hapus($id)
    {
        $sql = "DELETE FROM santri WHERE id_santri = $id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM santri WHERE id_santri = $id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function update($id, $nama, $alamat, $jurusan)
    {
        $sql = "UPDATE santri SET nama='$nama', alamat='$alamat', jurusan='$jurusan' WHERE id_santri = $id";
        $query = $this->db->query($sql);
        return $query;
    }
}
