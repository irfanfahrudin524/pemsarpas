<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800"><?= $title ?></h3>
    </div>

    <table class="table table-bordered table-striped mt-2">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Peminjam</th>
                <th class="text-center">Nama Ruangan</th>
                <th class="text-center">Tanggal Pinjam</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pinjam_ruangan as $pruang) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pruang->nama; ?></td>
                    <td><?= $pruang->ruangan; ?></td>
                    <td><?= $pruang->tanggal; ?></td>
                    <?php
                    if ($pruang->status == 'Ditolak') {
                        echo '<td><button class="btn btn-danger form-control">Ditolak</button></td>';
                    } else if ($pruang->status == 'Diterima') {
                        echo '<td><button class="btn btn-success form-control">Diterima</button></td>';
                    } else if ($pruang->status == 'Pending') {
                        echo '<td><a class="btn btn-info form-control" href="'.base_url("admin/peminjaman_prasarana/accPinjam/".$pruang->id).'">'.$pruang->status.'</a></td>';
                    }
                    ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
