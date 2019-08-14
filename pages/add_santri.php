<?php

require "config/Library.php";
require "config/link.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["submit"])) {
        $cek = $_POST["tambah"];
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
            $data = $tambah->tambah($nama, $alamat, $jurusan);
        }
    }
}

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TAMBAH SANTRI</h2>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <strong>
                            <h2>TAMBAH DATA</h2>
                        </strong>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST">
                            <div class="form-group form-float">
                                <input type="hidden" name="tambah" value="tambah">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" required>
                                    <label class="form-label">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="alamat" required>
                                    <label class="form-label">Alamat</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="jurusan" required>
                                    <label class="form-label">Jurusan</label>
                                </div>
                            </div>

                            <button class="btn btn-primary waves-effect tambah-data" name="submit" type="submit">TAMBAH</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($cek)) :
    ?>

<div class="flash-data" data-flashdata="<?= $cek ?>"></div>

<?php endif; ?>

<script>
    $(document).ready(function() {
        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            Swal.fire({
                type: 'success',
                title: 'Data Santri',
                text: ' Berhasil di Tambahkan!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = 'index.php'
                }
            })
        }
    })
</script>