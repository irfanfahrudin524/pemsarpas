<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <?php foreach ($user as $u): ?>
            <form method="POST" action="<?= base_url('admin/Management_user/edit/' . $u->id_user) ?>">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="hidden" class="form-control" name="id_user" value="<?= $u->id_user ?>">
                            <input type="text" class="form-control" name="NAMA" value="<?= $u->NAMA ?>">
                            <?= form_error('NAMA', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="NIM">NIM/NIP</label>
                            <input type="text" class="form-control" name="NIM" value="<?= $u->NIM ?>">
                            <?= form_error('NIM', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="unit">unit</label>
                            <input type="text" class="form-control" name="unit" value="<?= $u->unit ?>">
                            <!-- <?= form_error('unit','<div class="text-small text-danger"></div>')?> -->
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $u->username ?>">
                            <?= form_error('username', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="<?= $u->password ?>">
                            <?= form_error('password', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level">
                                <option value="">--Pilih Level--</option>
                                <option value="Admin" <?= $u->level === 'Admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="User" <?= $u->level === 'User' ? 'selected' : '' ?>>User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
