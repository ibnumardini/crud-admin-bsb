<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <div class="row clearfix">
            <!-- Widgets -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        <div class="text">JUMLAH SANTRI</div>
                        <div class="number count-to" data-from="0" data-to="1" data-speed="1" data-fresh-interval="1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tampil Data -->
<section class="content marg">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SANTRI QODR HQ
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require "config/Library.php";
                                $tampil = new Library();
                                $cetak = $tampil->tampil();
                                $i = 1;
                                while ($data = $cetak->fetch(PDO::FETCH_OBJ)) :
                                    ?>

                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $data->nama ?></td>
                                        <td><?= $data->alamat ?></td>
                                        <td><?= $data->jurusan ?></td>
                                        <td>
                                            <a class="btn btn-success" href="index.php?p=edit&id=<?= $data->id_santri ?>">Edit</a>
                                            <a class="btn btn-danger" onclick=" return confirm('Yakin mau di hapus?')" href="pages/hapus.php?id=<?= $data->id_santri ?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                endwhile;
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- END -->


<script>
    $(document).ready(function() {
        M.updateTextFields();
    });
</script>