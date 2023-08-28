<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/Management_user/tambah_aksi')?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                            <!-- <?= form_error('nama','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM/NIP</label>
                            <input type="text" class="form-control" name="nim" id="nim">
                            <!-- <?= form_error('nim','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" name="unit" id="unit">
                            <!-- <?= form_error('unit','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                            <!-- <?= form_error('username','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                            <!-- <?= form_error('password','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" id="level" name="level">
                                <option value="">--Pilih Level--</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" value="submit">Simpan</button>
                <a class="btn btn-light" href="<?= base_url('admin/Management_user')?>">Batal</a>
            </form>
        </div>
    </div>
</div>

