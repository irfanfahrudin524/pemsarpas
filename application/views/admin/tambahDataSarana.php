<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/Data_sarana/tambah_aksi')?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Alat/Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                <?= form_error('nama_barang','<div class="text-small text-danger">', '</div>')?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                                <?= form_error('kode_barang','<div class="text-small text-danger">', '</div>')?>
                            </div>
                        </div>
                    </div> 
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
