<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Other Menu</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <a href="<?= site_url(array("User", "register")) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>
                            &nbsp;&nbsp;ADD DATA USER
                        </a> &nbsp;
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table-user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Role</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $user) {
                        ?>
                            <tr id="<?= $user->id_user ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->nama_pegawai ?></td>
                                <td><?= $user->alamat_pegawai ?></td>
                                <td><?= getLevel($user->level) ?></td>
                                <td style="text-align: center"><span class="badge bg-primary"><?= formatStatus($user->is_active) ?></span></td>
                                <td style="text-align: center">
                                    <button data-id="<?= $user->id_user ?>" class="btn btn-warning btn-sm btn-reset-password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <a href="<?= site_url("User/update/$user->id_user") ?>" class="btn btn-sm btn-info" data-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" data-id="<?= $user->id_user ?>" id="delete_id" class="btn btn-sm btn-danger tombolHapus">
                                        <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        let idUser = 0;
        $(".tombolHapus").on("click", function() {
            var id = $(this).data('id');
            SwalDelete(id);
            console.log(id);
            // e.preventDefault();
        });

        var table = $('#table-user').DataTable({
            buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
            ],
            // buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
            dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            columnDefs: [{
                targets: -1,
                orderable: false,
                searchable: false
            }]
        });

        table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');

        $(".btn-reset-password").on("click", function() {
            let idUser = $(this).data("id");
            $.confirm({
                theme: "material",
                type: "dark",
                title: "Konfirmasi",
                content: "Anda yakin akan mereset password user ini?<br> Password akan dikirim ke email user",
                buttons: {
                    buttonOke: {
                        text: "Reset Password",
                        btnClass: "btn-dark",
                        action: function() {
                            prosesReset(idUser);
                        }
                    },
                    buttonBatal: {
                        text: "Batal",
                        btnClass: "btn-info",
                        action: function() {

                        }
                    }
                }
            });
        });

        function prosesReset(idUser) {
            $.LoadingOverlay("show");
            var url = "User/reset_password/"
            $.ajax({
                url: '<?= base_url() ?>' + url,
                type: "post",
                data: {
                    id_user: idUser
                },
                success: function(result) {
                    $.LoadingOverlay("hide");
                    if (result == "1") {
                        $.alert({
                            title: "Sukses",
                            content: "Password Berhasil di reset"
                        });
                    }

                }
            })
        }
    });

    function SwalDelete(id) {
        $.confirm({
            theme: 'modern',
            icon: 'fa fa-warning',
            title: 'Hapus Data!',
            content: 'Apakah anda yakin hapus data ini ? <br>',
            closeIcon: true,
            boxWidth: '500px',
            useBootstrap: false,
            closeIconClass: 'fa fa-close',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'HAPUS',
                    btnClass: 'btn-red',
                    action: function() {
                        var url = "User/proses_hapus/"
                        $.ajax({
                                url: '<?= base_url() ?>' + url + id,
                                type: "POST",
                            })
                            .done(function(id) {
                                $.alert({
                                    theme: 'modern',
                                    icon: 'fa fa-success',
                                    title: 'Data Terhapus!',
                                    content: false,
                                    closeIcon: true,
                                    boxWidth: '500px',
                                    useBootstrap: false,
                                    type: 'blue',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: 'OKE',
                                            btnClass: 'btn-blue',
                                            action: function() {
                                                window.location.replace("<?= site_url("User") ?>");
                                            }
                                        },
                                    }
                                });
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Ada Kesalahan dalam Proses!', 'error')
                            });
                    }
                },
                close: function() {}
            }
        });
    }
</script>