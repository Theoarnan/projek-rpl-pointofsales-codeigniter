<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $header ?></h1>
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
        <div class="row">
            <div class="col-md-12">
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
                        <form id="form-update-user" method="post" action="<?= site_url('User/proses_update') ?>" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-sm" value="<?= $users->email ?>" id="email" name="email" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $users->username ?>" id="username" name="username" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-sm" value="<?= $users->password ?>" id="password" name="password" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password Confirm</label>
                                        <input type="text" class="form-control form-control-sm" id="passconf" name="passconf" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Role Level</label>
                                        <input type="text" value="<?= $users->level ?>" class="form-control" id="rolelevel" name="rolelevel" placeholder="--" readonly>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="id_users" name="id_user" value="<?= $users->id_user; ?>" />
                            <div class="card-footer text-center">
                                <button id="btn-save-user" type="button" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;SIMPAN DATA</button>&nbsp;&nbsp;
                                <button id="btn-reset" type="reset" class="btn btn-info btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;RESET DATA</button>
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
        $("#btn-save-user").on("click", function() {
            Swal.fire({
                title: "Memproses Data..",
                text: "On Proccess!",
                imageUrl: '<?= base_url() ?>' + "images/loadings.gif",
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 2000,
            });
            let validate = $("#form-update-user").valid();
            if (validate) {
                $(document).ready(function() {
                    var dataString = $("#form-update-user").serialize();
                    var url = "User/proses_update"
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() ?>" + url,
                        data: dataString,
                        success: function(data) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'Berhasil',
                                title: 'Data Berhasil Diubah!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function() {
                                window.location.replace("<?= site_url("User") ?>");
                            });
                        },
                        error: function(data) {
                            Swal.fire("Data gagal ditambahkan!", data, "error");
                        }

                    });
                });

            }
        });
        $("#form-update-user").validate({
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
                    // minlength: "Your password must be at least 5 characters long",
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