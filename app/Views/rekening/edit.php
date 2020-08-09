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
            <div class="widget-one">
                <form action="/rekening/update/<?= $rekening->id; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $rekening->id; ?>">
                    <input type="hidden" name="oldFile" value="<?= $rekening->file;?>">
                    <div class="form-row mb-4">
                        <div class="col-xl-4">
                            <label>Tanggal Transaksi :</label>
                            <input id="basicFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." name="tanggal" value="<?= $rekening->date; ?>">
                        </div>
                        <div class="col-xl-4">
                            <label>Jenis :</label>
                            <input type="text" class="form-control" name="jenis" value="<?= $rekening->jenis; ?>">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-xl-4">
                            <label>Pemasukan :</label>
                            <input type="text" class="form-control" name="pemasukan" value="<?= $rekening->pemasukan; ?>">
                        </div>
                        <div class="col-xl-4">
                            <label>Pengeluaran</label>
                            <input type="text" class="form-control" name="pengeluaran" value="<?= $rekening->pengeluaran; ?>">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-xl-8">
                            <label>Keterangan :</label>
                            <textarea type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" name="keterangan"><?= $rekening->keterangan; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-xl-8">
                            <label>Upload Bukti Transaksi :</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" name="file" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('file'); ?>
                                </div>
                                <label class="custom-file-label" for="customFile"><?php if($rekening->file != NULL):echo $rekening->file; else: echo 'Choose File'; endif;?></label>
                            </div>
                            <img <?php if($rekening->file != NULL):?> src="/uploads/<?= $rekening->file;?>" <?php endif;?> class="img-thumbnail img-preview">
                        </div>
                    </div>
                    <input type="submit" name="time" class="mb-4 btn btn-primary">
                </form>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>