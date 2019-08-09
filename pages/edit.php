<?php


require "config/Library.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["submit"])) {

        $id = $_GET["id"];
        $nama = htmlspecialchars($_POST["name"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $jurusan = htmlspecialchars($_POST["jurusan"]);

        if (empty($nama)) {
            echo "Please inset your name!";
            die;
        }
        if (empty($alamat)) {
            echo "Please inset your alamat!";
            die;
        }
        if (empty($jurusan)) {
            echo "Please inset your jurusan!";
            die;
        }
        if (!empty($nama && $alamat && $jurusan)) {

            $tambah = new Library;
            $data = $tambah->update($id, $nama, $alamat, $jurusan);
            if ($data) {
                echo "<script>alert('Berhasil Upload Data!')</script>";
                echo "<script>window.location = 'index.php'</script>";
            } else {
                echo "<script>alert('Gagal Upload Data!')</script>";
            }
        }
    }
}

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT DATA SANTRI</h2>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <strong>
                            <h2>EDIT DATA</h2>
                        </strong>
                    </div>
                    <?php
                    $data = new Library;
                    $id = $_GET["id"];
                    $tampil = $data->edit($id);
                    $cetak = $tampil->fetch(PDO::FETCH_OBJ);
                    ?>
                    <div class="body">
                        <form id="form_validation" method="POST">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" value="<?= $cetak->nama ?>" required>
                                    <label class="form-label">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="alamat" value="<?= $cetak->alamat ?>" required>
                                    <label class="form-label">Alamat</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="jurusan" value="<?= $cetak->jurusan ?>" required>
                                    <label class="form-label">Jurusan</label>
                                </div>
                            </div>

                            <button class="btn btn-primary waves-effect" name="submit" type="submit">EDIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
    </div>
</section>