<div class="container-fluid">
    <div class="col-md-12">
        <h3 class="mx-auto text-center mb-3">Riwayat Peminjaman Ruangan</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Tanggal Pinjam</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pinjam_ruangan as $pruang): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pruang->nama; ?></td>
                        <td><?= $pruang->kode; ?></td>
                        <td><?= $pruang->tanggal; ?></td>
                        <td>
                            <?php if ($pruang->status == 'Ditolak'): ?>
                                <button class="btn btn-danger form-control">Ditolak</button>
                            <?php elseif ($pruang->status == 'Diterima'): ?>
                                <button class="btn btn-success form-control">Diterima</button>
                            <?php elseif ($pruang->status == 'Pending'): ?>
                                <button class="btn btn-info form-control">Pending</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
