<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/Data_sarana/tambah')?>">
        <i class="fas fa-plus"></i> Tambah Data Alat/Barang
    </a>
    <br> 

    <?= $this->session->flashdata('pesan')?>
    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Kode Barang</th>
            <th class="text-center">Aksi</th>
        </tr>

        <?php $no=1; foreach($alat as $a) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $a->nama_barang ?></td>
                <td><?= $a->kode_barang ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/Data_sarana/update_data/'.$a->id_barang)?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/Data_sarana/hapus/'.$a->id_barang)?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>