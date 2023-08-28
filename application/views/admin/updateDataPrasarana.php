<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <?php foreach ($ruangan as $r): ?>
            <form method="POST" action="<?= base_url('admin/Data_prasarana/edit/'. $r->id_ruang)?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Ruangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="nama_ruangan">Nama Ruangan</label>
                                <input type="hidden" class="form-control" name="id_ruang" value="<?= $r->id_ruang?>">
                                <input type="text" class="form-control" name="nama_ruangan" value="<?= $r->nama_ruangan ?>">
                                <?= form_error('nama_ruangan', '<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="kode_ruangan">Kode Ruangan</label>
                                <input type="text" class="form-control" name="kode_ruangan" value="<?= $r->kode_ruangan ?>">
                                <?= form_error('kode_ruangan', '<div class="text-small text-danger"></div>') ?>
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
