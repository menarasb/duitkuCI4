<?= $this->extend('layout/admin'); ?>
<?= $this->section('custom_css'); ?>
<link href="<?= base_url('style'); ?>/cork_top/assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="page-header">
    <div class="page-title">
        <h3>Pengeluaran dan Pemasukan Rekening</h3>
    </div>

    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg></a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Data Rekening</span></li>
        </ol>
    </nav>

</div>
<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="widget-content-area br-4">
            <div class="widget-one">
                <table>
                    <tr>
                        <td>
                            <form action="/rekening/" method="post" class="d-inline">
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <select class="form-control" style="width:130px">
                                            <option selected="selected">Agustus</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control">
                                            <option selected="selected">2020</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="/rekening/create" class="btn btn-primary mb-4 ml-3">Tambah Transaksi</a>
                        </td>
                    </tr>
                </table>



                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-primary" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table id="example" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Jenis</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script src="<?= base_url('style'); ?>/cork_top/assets/js/components/ui-accordions.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "ajax": "data/dataRekening",
            "columns": [{
                    "data": "date"
                },
                {
                    "data": "pemasukan"
                },
                {
                    "data": "pengeluaran"
                },
                {
                    "data": "jenis"
                },
                {
                    "data": "id",
                    "render": function(data, type, row) {
                        return '<a href="/rekening/' + data + '" class="btn btn-sm btn-primary">Detail</a>';
                    }
                }
            ],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [10, 100, 200, 500],
            "pageLength": 10
        });
    });
</script>
<?= $this->endSection(); ?>