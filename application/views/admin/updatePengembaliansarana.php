<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <?php foreach ($pengembalian as $pe): ?>
            <form method="POST" action="<?= base_url('admin/Pengembalian/edit/' . $pe->id_kembali) ?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengembalian Peminjaman</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $pe->id_kembali?>">
                            <input type="text" class="form-control" name="Nama" value="<?= $pe->Nama?>">
                            <?= form_error('Nama', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="NIM">NIM</label>
                            <input type="text" class="form-control" name="NIM" value="<?= $pe->NIM ?>">
                            <?= form_error('NIM', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="unit">unit</label>
                            <input type="text" class="form-control" name="unit" value="<?= $pe->unit ?>">
                            <!-- <?= form_error('unit','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" value="<?= $pe->nama_barang ?>">
                            <?= form_error('nama_barang', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="kode_barang" class="form-control" name="kode_barang" value="<?= $pe->kode_barang ?>">
                            <?= form_error('kode_barang', '<div class="text-small text-danger"></div>') ?>
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
