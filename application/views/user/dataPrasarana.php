<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mx-auto text-center"><?php echo $title ?></h3>
    </div>

    <?= $this->session->flashdata('pesan')?>
    <table class="table table-bordered table-striped mt-2">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Ruangan</th>
                <th class="text-center">Kode Ruangan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <?php $no=1; foreach($ruangan as $r) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $r->nama_ruangan ?></td>
                <td><?= $r->kode_ruangan ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('user/Data_prasarana/form_minjam/'.$r->id_ruang)?>">Pinjam</a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>