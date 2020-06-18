<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ubah Data Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Pegawai</a></li>
                        <li class="breadcrumb-item active">Update Data Pegawai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
    <?php $this->view('message') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <a href="<?= site_url(array("Pegawai")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                                    KEMBALI
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-ubah-pegawai" method="post" action="<?= site_url('Pegawai/proses_update') ?>" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama" value="<?= $pegawais->nama_pegawai ?>" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pilih Jabatan</label>
                                        <select id="jabatan" name="jbtn" class="form-control" required>
                                            <option value="<?= $pegawais->jabatan ?>" <?= $pegawais->jabatan != null ? "selected" : 'disable selected' ?>><?= $pegawais->jabatan != null ? getLevel($pegawais->jabatan) : 'Pilih Jabatan'  ?></option>
                                            <option value="superadmin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat Pegawai</label>
                                        <input type="text" class="form-control" id="alamat_pegawai" name="alamat" value="<?= $pegawais->alamat_pegawai ?>" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select id="jenis_kelamin" value="<?= $pegawais->jenis_kelamin ?>" name="jk" class="form-control">
                                            <option value="<?= $pegawais->jenis_kelamin ?>" <?= $pegawais->jenis_kelamin != null ? "selected" : 'disable selected' ?>><?= $pegawais->jenis_kelamin != null ? getJenisKelaminLengkap($pegawais->jenis_kelamin) : 'Pilih Jabatan'  ?></option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="number" class="form-control" id="no_telp" name="nomer" value="<?= $pegawais->no_telp ?>" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button id="btn-update-pegawai" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;SIMPAN DATA</button>&nbsp;&nbsp;
                                <button id="btn-reset" type="reset" class="btn btn-info btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;RESET DATA</button>
                            </div>
                            <input type="hidden" id="id_pegawai" name="id_pegawai" value="<?= $pegawais->id_pegawai; ?>" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        $("#btn-update-pegawai").on("click", function() {
            let validate = $("#form-ubah-pegawai").valid();
            if (validate) {
                Swal.fire({
                    timerProgressBar: true,
                    title: "Memproses Data..",
                    text: "On Proccess!",
                    // imageUrl: '<?= base_url() ?>' + "images/loadings.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000,
                    delay: 2000
                });
                $("#form-ubah-pegawai").submit();
            }
        });
        
        $("#form-ubah-pegawai").validate({
            rules: {
                nomer: {
                    digits: true,
                    required: true,
                    minlength: 5
                },
                alamat: {
                    required: true
                }
            },
            messages: {
                nomer: {
                    digits: "Hanya nomer saja",
                    minlength: "Nomer 12 digit"
                }
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