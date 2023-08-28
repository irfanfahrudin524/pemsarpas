<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <?php foreach ($pengembalian_ruang as $peruang): ?>
            <form method="POST" action="<?= base_url('admin/Pengembalian_ruangan/edit/' . $peruang->id_kembali) ?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengembalian Peminjaman</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $peruang->id_kembali ?>">
                            <input type="text" class="form-control" name="Nama" value="<?= $peruang->Nama ?>">
                            <?= form_error('Nama', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="NIM">NIM</label>
                            <input type="text" class="form-control" name="NIM" value="<?= $peruang->NIM ?>">
                            <?= form_error('NIM', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="unit">unit</label>
                            <input type="text" class="form-control" name="unit" value="<?= $peruang->unit ?>">
                            <!-- <?= form_error('unit','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="nama_ruangan">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruangan" value="<?= $peruang->nama_ruangan ?>">
                            <?= form_error('nama_ruangan', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="kode_ruangan">Kode Ruangan</label>
                            <input type="text" class="form-control" name="kode_ruangan" value="<?= $peruang->kode_ruangan ?>">
                            <?= form_error('kode_ruangan', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal kembali</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
