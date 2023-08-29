<?php
echo $this->session->flashdata('message');
foreach ($query->result() as $a) {
?>
    <div class="container">
        <div class="col-md-12">
            <h1 class="mx-auto text-center mb-3">Form Peminjaman</h1>
        </div>
        <form class="form" method="post" action="<?= base_url('user/Data_sarana/pinjam') ?>" enctype="multipart/form-data">
            <!-- Form inputs and fields -->
            <div class="form-group row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_barang" value="<?= $a->nama_barang ?>" readonly>
                </div>
            </div>
                <div class="form-group row">
                    <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_barang" value="<?= $a->kode_barang ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" value="<?= $this->session->userdata('nama'); ?>" readonly>
                    </div>
                </div>
                <input type="hidden" id="id_user" name="id_user" value="<?= $id_user ?>">
                <input type="hidden" id="id_pengguna" name="id_pengguna" value="<?= $pengguna['id_pengguna']; ?>">
                <!-- <input type="hidden" id="id_user" name="id_user" value="<?= $this->session->userdata('id_user'); ?>"> -->
                <input type="hidden" id="barang_id" name="barang_id" value="<?= $a->id_barang ?>">
                <div class="form-group row">
                    <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" value="<?= $this->session->userdata('nim'); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="unit" value="<?= $this->session->userdata('unit'); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d'); ?>">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="alasan" class="col-sm-2 col-form-label">Alasan Pinjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alasan" id="alasan" placeholder="Alasan Pinjam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bukti" class="col-sm-2 col-form-label">Lampiran/Bukti</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="bukti" id="bukti" required>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                </div>
            </div>
        </form>
    </div>
<?php
}
?>






