<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800"><?= $title ?></h3>
    </div>

    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Peminjam</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Tanggal Pinjam</th>
            <th class="text-center">Status</th>
        </tr>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pinjam as $pi) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pi->nama; ?></td>
                    <td><?= $pi->barang; ?></td>
                    <td><?= $pi->tanggal; ?></td>
                    <?php
                    if ($pi->status == 'Ditolak') {
                        echo '<td><button class="btn btn-danger form-control">Ditolak</button></td>';
                    } else if ($pi->status == 'Diterima') {
                        echo '<td><button class="btn btn-success form-control">Diterima</button></td>';
                    } else if ($pi->status == 'Pending') {
                        echo '<td><a class="btn btn-info form-control" href="'.base_url("admin/peminjaman_sarana/accPinjam/".$pi->id).'">'.$pi->status.'</a></td>';
                    }
                    ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
