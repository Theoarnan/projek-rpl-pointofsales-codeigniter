<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $header ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item active">Data Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <a href="<?= site_url(array("Supplier")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                                    KEMBALI
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-supplier" method="post" action="<?= site_url('Supplier/proses_simpan') ?>" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="<?= $suppliers->nama_supplier ?>" id="nama_supplier" name="nama_supp" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No. Telpon</label>
                                        <input type="text" class="form-control" value="<?= $suppliers->no_telp ?>" id="no_telp" name="no_telpon" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" value="<?= $suppliers->alamat ?>" id="alamat" name="alamats" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" value="<?= $suppliers->deskripsi ?>" id="deskripsi" name="desk" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button id="btn-save-supplier" name="<?=$pages?>" type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;SIMPAN DATA</button>&nbsp;&nbsp;
                                <button id="btn-reset" type="reset" class="btn btn-info btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;RESET DATA</button>
                            </div>
                            <input type="hidden" id="id_supplier" name="id_supplier" value="<?= $suppliers->id_supplier; ?>" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        $("#btn-save-supplier").on("click", function() {
            let validate = $("#form-tambah-supplier").valid();
            if (validate) {
                swal({
                    title: "Processing Data..",
                    text: "Data sedang berkelana",
                    timer: 6000,
                    imageUrl: '<?= base_url() . 'images/' ?>' + "MarriedMarvelousHawaiianmonkseal-small.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                $("#form-tambah-supplier").submit();
            }
        });
        $("#form-tambah-supplier").validate({
            rules: {
                nama_supp: {
                    required: true
                },
                no_telpon: {
                    required: true,
                    digits: true,
                    minlength: 10,
                },
                alamats: {
                    required: true
                },
                desk: {
                    required: true
                }
            },
            messages: {
                nama_supp: {
                    required: "Anda belum masukan nama supplier",
                },
                no_telpon: {
                    required: "Anda belum masukkan no telpon supplier",
                    minlength: "nomer yang anda masukkan kurang",
                    digits: "Yang anda masukkan bukan nomer!"
                },
                alamats: {
                    required: "Anda belum memasukkan alamat"
                },
                desk: {
                    required: "Anda belum menuliskan keterangan"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>