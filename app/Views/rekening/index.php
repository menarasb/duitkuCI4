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
            <li class="breadcrumb-item active" aria-current="page"><span>Data Rekening </span></li>
        </ol>
    </nav>

</div>
<div class="row widget-statistic">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="widget widget-one_hybrid widget-followers">
            <div class="widget-heading">
                <p class="w-value" id="sumPemasukan"></p>
                <h5 class="">Total Pemasukan</h5>
            </div>

        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="widget widget-one_hybrid widget-referral">
            <div class="widget-heading">
                <p class="w-value" id="sumPengeluaran"></p>
                <h5 class="">Total Pengeluaran</h5>
            </div>

        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="widget widget-one_hybrid widget-engagement">
            <div class="widget-heading">

                <p class="w-value" id="sisaSaldo"></p>
                <h5 class="">Sisa Saldo</h5>
            </div>

        </div>
    </div>
</div>
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="widget-content-area br-4">
            <table>
                <tr>
                    <td>
                        <form action="/rekening/bulan_tahun" method="POST" class="d-inline">
                            <div class="form-row mb-4">
                                <div class="col mr-2">
                                    <select class="form-control" id="bulan" style="width:130px" name="bulan">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" id="tahun" name="tahun">
                                        <option selected="selected">2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                    </select>
                                </div>
                            </div>

                    </td>
                    <td>
                        <button href="/rekening/create" type="submit" class="btn btn-warning mb-4 ml-3">Pilih</button>
                        </form>
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
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "ajax": "data/dataRekening",
            "columns": [{
                    data: {
                        date: "date",
                        id:"id"
                    },
                    render: function(data) {
                        return '<a href="/rekening/'+data.id+'">'+data.date+'</a>';
                    }
                },
                {
                    data: "pemasukan",
                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                },
                {
                    data: "pengeluaran",
                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                },
                {
                    data: "jenis"
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
<script>
    let dropdown = $('#bulan');
    let dropdownTahun = $('#tahun');

    dropdown.empty();
    dropdown.prop('selectedIndex', 0);

    dropdownTahun.empty();
    dropdownTahun.prop('selectedIndex', 0);

    const url = '/data/dataBulan';
    const urlSelected = '/data/sessionBulanTahun';
    const urlTahun = '/data/dataTahun';

    // selected 
    $.getJSON(urlSelected, function(data) {
        dropdown.append($('<option selected></option>').attr('value', data.angka).text(data.bulan));
    });

    $.getJSON(urlSelected, function(data) {
        dropdownTahun.append($('<option selected></option>').attr('value', data.tahun).text(data.tahun));
    });

    // Populate dropdown
    $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.angka).text(entry.bulan));
        })
    });

    // Populate dropdown
    $.getJSON(urlTahun, function(data) {
        $.each(data, function(key, entry) {
            dropdownTahun.append($('<option></option>').attr('value', entry.tahun).text(entry.tahun));
        })
    });
</script>
<script>
    const jsonRek = '/data/dataRekening';
    $.getJSON(jsonRek, function(data) {
        var sumPengeluaran = `${data.sumPengeluaran}`
        var formatPengeluaran = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(sumPengeluaran)
        var sumPemasukan = `${data.sumPemasukan}`
        var formatPemasukan = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(sumPemasukan)
        var sisaSaldo = `${data.sisaSaldo}`
        var formatSisaSaldo = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(sisaSaldo)
        $("#sumPengeluaran").html(formatPengeluaran);
        $("#sumPemasukan").html(formatPemasukan);
        $("#sisaSaldo").html(formatSisaSaldo);
    });
</script>
<?= $this->endSection(); ?>