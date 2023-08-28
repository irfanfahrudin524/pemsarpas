<div class="container">
    <div class="col-md-12">
        <h1 class="mx-auto text-center mb-3">Form Peminjaman</h1>
    </div>
    <?php echo $this->session->flashdata('message'); ?>
    <?php foreach ($query->result() as $r): ?>
        <form class="form" method="post" action="<?= base_url('user/Data_prasarana/pinjam') ?>">
            <div class="form-group row">
                <label for="nama_ruangan" class="col-sm-2 col-form-label">Nama Ruangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_ruangan" value="<?= $r->nama_ruangan ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="kode_ruangan" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode_ruangan" value="<?= $r->kode_ruangan ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="NAMA" value="<?= $user ['NAMA']; ?>" readonly>
                </div>
            </div>
            <input type="hidden" id="user_id" name="user_id" value="<?= $user['id'];?>">
            <input type="hidden" id="barang_id" name="barang_id" value="<?= $r->id_ruang ?>">
            <div class="form-group row">
                <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="NIM" value="<?= $user['NIM'] ; '' ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="unit" value="<?= $user['unit']; ?>" readonly>
                    </div>
                </div>
            <div class="form-group row">
                <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal" id="tgl_pinjam" placeholder="Tanggal">
                </div>
            </div>
            <div class="form-group row">
                <label for="alasan" class="col-sm-2 col-form-label">Alasan Pinjam</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alasan" id="alasan" placeholder="Alasan Pinjam">
                </div>
            </div>
            <div class="form-group row">
                <label for="bukti_izin" class="col-sm-2 col-form-label">Lampiran/Bukti</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="bukti_izin" id="bukti_izin">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</div>
