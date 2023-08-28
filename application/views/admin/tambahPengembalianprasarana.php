<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/Pengembalian_ruangan/tambah_aksi')?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengembalian</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="Nama" id="Nama">
                        </div>
                        <div class="form-group">
                            <label for="NIM">NIM</label>
                            <input type="text" class="form-control" name="NIM" id="NIM">
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" name="unit" id="unit">
                        </div>
                        <div class="form-group">
                            <label for="nama_ruangan">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan">
                        </div>
                        <div class="form-group">
                            <label for="kode_ruangan">Kode Ruangan</label>
                            <input type="text" class="form-control" name="kode_ruangan" id="kode_ruangan">
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal kembali</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-light" href="<?= base_url('admin/Pengembalian_ruangan')?>">Batal</a>
            </form>
        </div>
    </div>
</div>
