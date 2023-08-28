<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
    </div>

    <div class="card-body">
        <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/Management_user/tambah')?>">
            <i class="fas fa-plus"></i> Tambah User
        </a>
        <br> 

        <?= $this->session->flashdata('pesan')?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">NIM/NIP</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Aksi</th>
                </tr>

                <?php $no = 1; foreach($pengguna as $pe) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pe->nama ?></td>
                        <td><?= $pe->nim ?></td>
                        <td><?= $pe->unit ?></td>
                        <td><?= $pe->username ?></td>
                        <td><?= $pe->level ?></td>
                        <td>
                            <center>
                                <a class="btn btn-sm btn-primary" href="<?= base_url('admin/Management_user/update_data/'.$pe->id_pengguna)?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/Management_user/hapus/'.$pe->id_pengguna)?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('js.php') ?>
<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>