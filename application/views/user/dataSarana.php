<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mx-auto text-center"><?php echo $title ?></h3>
    </div>

    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Alat/Barang</th>
                <th class="text-center">Kode Alat/Barang</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($alat as $a) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a->nama_barang ?></td>
                    <td><?= $a->kode_barang ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-primary" href="<?= base_url('user/Data_sarana/form_minjam/'.$a->id_barang) ?>">Pinjam</a>
                        </center>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
