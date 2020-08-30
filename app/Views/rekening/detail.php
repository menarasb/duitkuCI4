<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg></a></li>
            <li class="breadcrumb-item"><a href="/rekening">Rekening</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Detail</span></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="widget-content-area br-4">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-4">
                    <thead>
                        <tr>
                            <th colspan="2">Detail Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td><?= $rekening->date; ?></td>
                        </tr>
                        <tr>
                            <td>Pemasukan</td>
                            <td>Rp <?= number_format($rekening->pemasukan, 2, ",", "."); ?></td>
                        </tr>
                        <tr>
                            <td>Pengeluaran</td>
                            <td>Rp <?= number_format($rekening->pengeluaran, 2, ",", "."); ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><?= $rekening->keterangan; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td><?= $rekening->jenis; ?></td>
                        </tr>
                        <tr>
                            <td>Last Update</td>
                            <td><?= $rekening->updated_at; ?></td>
                        </tr>
                        <tr>
                            <td>Bukti Transaksi</td>
                            <td><?php if ($rekening->file != NULL) : ?><img src="/uploads/<?= $rekening->file; ?>"><?php else : echo '-';
                                                                                                                endif; ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="/rekening/edit/<?= $rekening->id; ?>" class="btn btn-warning">Update Transaksi</a>
                <form action="/rekening/<?= $rekening->id; ?>" method="post" class="d-inline">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah yakin akan di delete?');">DELETE</button>
                </form>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>