<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <?php foreach ($alat as $a): ?>
            <form method="POST" action="<?= base_url('admin/Data_sarana/edit/'. $a->id_barang)?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="hidden" class="form-control" name="id_barang" value="<?= $a->id_barang?>">
                                <input type="text" class="form-control" name="nama_barang" value="<?= $a->nama_barang?>">
                                <?= form_error('nama_barang', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="kode_barang">Kode Ruangan</label>
                                <input type="text" class="form-control" name="kode_barang" value="<?= $a->kode_barang ?>">
                                <?= form_error('kode_barang', '<div class="text-small text-danger">', '</div>') ?>
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
