<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data User</a></li>
                        <li class="breadcrumb-item active">Add Data User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <a href="<?= site_url(array("User")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                                    KEMBALI
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-user" method="post" action="<?= site_url('User/proses_simpan') ?>" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Pilih Pegawai</label>
                                        <select name="pegawai_id" class="form-control" id="select-pegawai" style="width: 100%;">
                                            <option value="" disabled selected>Pilih Pegawai</option>
                                            <?php
                                            foreach ($pegawais as $p) {
                                                echo "<option data-nama='$p->nama_pegawai' "
                                                    . " data-alamat='$p->alamat_pegawai' "
                                                    . " data-telp='$p->no_telp' "
                                                    . " data-jabatan='$p->jabatan' "
                                                    . " value='$p->id_pegawai' "
                                                    . " $p->id_pegawai == $users->pegawai_id ? 'selected' : null> "
                                                    . "$p->nama_pegawai / $p->jabatan"
                                                    . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter ..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role Level</label>
                                        <input type="text" value="" class="form-control" id="rolelevel" name="level" placeholder="--" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button id="btn-save-user" type="button" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;SIMPAN DATA</button>&nbsp;&nbsp;
                                <button id="btn-reset" type="reset" class="btn btn-info btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;RESET DATA</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h5>DETAIL PEGAWAI</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-user" method="post" action="<?= site_url('User/proses_simpan') ?>" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" class="form-control" id="nama_peg" name="nama_peg" placeholder="--" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" id="almt" name="almt" placeholder="--" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="email" class="form-control" id="notelp" name="notelp" placeholder="--" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" value="" class="form-control" id="jabatans" name="jabatans" placeholder="--" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        $("#select-pegawai").select2({
            theme: 'bootstrap4'
        }).on("change", function() {
            var optionSelected = $(this).children("option:selected");
            $("#rolelevel").val(optionSelected.data("jabatan"));
            $("#nama_peg").val(optionSelected.data("nama"));
            $("#almt").val(optionSelected.data("alamat"));
            $("#notelp").val(optionSelected.data("telp"));
            $("#jabatans").val(optionSelected.data("jabatan"));
            $("#rolelevel").val($("#jabatans").val());

        });

        $("#btn-save-user").on("click", function() {
            let validate = $("#form-tambah-user").valid();
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
                $("#form-tambah-user").submit();
            }
        });
        $("#form-tambah-user").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                passconf: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                rolelevel: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Anda belum masukan username",
                    minlength: "Masukkan username lebih dari 5 karakter"
                },
                password: {
                    required: "Anda belum masukkan password",
                    minlength: "Masukkan username lebih dari 5 karakter!"
                },
                passconf: {
                    required: "Masukkan password konfrimasi",
                    equalTo: "Password konfirmasi anda tidak sama!"
                },
                alamat: {
                    required: "Anda belum memasukkan alamat"
                },
                rolelevel: {
                    required: "Pilih role level user!"
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