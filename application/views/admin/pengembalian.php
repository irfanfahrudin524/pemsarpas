<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/Pengembalian/tambah')?>">
        <i class="fas fa-plus"></i> Tambah Data Pengembalian
    </a>
    <br> 

    <?= $this->session->flashdata('pesan')?>
    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Peminjam</th>
            <th class="text-center">NIM</th>
            <th class="text-center">Unit</th>
            <th class="text-center">Nama Alat/Barang</th>
            <th class="text-center">Kode Barang</th>
            <th class="text-center">Tanggal Kembali</th>
            <th class="text-center">Aksi</th>
        </tr>

        <?php $no = 1; foreach($pengembalian as $pe) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pe->Nama ?></td>
                <td><?= $pe->NIM ?></td>
                <td><?= $pe->unit?></td>
                <td><?= $pe->nama_barang?></td>
                <td><?= $pe->kode_barang?></td>
                <td><?= $pe->tanggal?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/Pengembalian/update_data/'.$pe->id_kembali)?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/Pengembalian/hapus/'.$pe->id_kembali)?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $this->load->view('js.php') ?>
<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>