<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<div class="page-header">
    <div class="page-title">
        <h3>Tambah Transaksi</h3>
    </div>
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
            <form action="/rekening/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-row mb-4">
                    <div class="col-xl-4">
                        <label>Tanggal Transaksi :</label>
                        <input id="basicFlatpickr" class="date form-control flatpickr flatpickr-input <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" type="text" placeholder="Select Date.." name="tanggal" value="<?= old('tanggal'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <label>Jenis :</label>
                        <input type="text" name="jenis" class="form-control" id="autocomplete-dynamic">
                        <!-- <input type="text" class="form-control" name="jenis" value="<?//= old('jenis'); ?>"> -->
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-xl-4">
                        <label>Pemasukan :</label>
                        <input type="text" class="form-control currency" name="pemasukan" value="<?= old('pemasukan'); ?>">
                    </div>
                    <div class="col-xl-4">
                        <label>Pengeluaran</label>
                        <input type="text" class="form-control currency" name="pengeluaran" value="<?= old('pemasukan'); ?>">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-xl-8">
                        <label>Keterangan :</label>
                        <textarea type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" name="keterangan"><?= old('keterangan'); ?></textarea>
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
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img src="" class="img-thumbnail img-preview">
                    </div>
                </div>
                <input type="submit" name="time" class="mb-4 btn btn-primary">
            </form>
        </div>
    </div>

</div>



<?= $this->endSection(); ?>
<?= $this->section('custom_js'); ?>
<script>
    $('.currency').inputmask({
        'alias': 'numeric',
        radixPoint: ',',
        'groupSeparator': '.',
        'autoGroup': true,
        'placeholder': '0.00'
    });
</script>
<script>
    $('.date').inputmask("9999-99-99");
</script>
<script>
    $('#autocomplete-dynamic').autocomplete({
        serviceUrl: '/data/dataJenis',
        transformResult: function(responseString) {
            var response = JSON.parse(responseString);
            var results = response.results;
            return {
                suggestions: $.map(results, function(item) {
                    return {
                        value: item.jenis,
                        data: item.id
                    }
                })
            }
        },
    });
</script>
<?= $this->endSection(); ?>