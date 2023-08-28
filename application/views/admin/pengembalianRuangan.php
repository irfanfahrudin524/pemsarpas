<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/Pengembalian_ruangan/tambah')?>">
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
            <th class="text-center">Nama Ruangan</th>
            <th class="text-center">Kode Ruangan</th>
            <th class="text-center">Tanggal Kembali</th>
            <th class="text-center">Aksi</th>
        </tr>

        <?php $no = 1; foreach($pengembalian_ruang as $peruang) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $peruang->Nama ?></td>
                <td><?= $peruang->NIM ?></td>
                <td><?= $peruang->unit?></td>
                <td><?= $peruang->nama_ruangan?></td>
                <td><?= $peruang->kode_ruangan?></td>
                <td><?= $peruang->tanggal?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/Pengembalian_ruangan/update_data/'.$peruang->id_kembali)?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/Pengembalian_ruangan/hapus/'.$peruang->id_kembali)?>">
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