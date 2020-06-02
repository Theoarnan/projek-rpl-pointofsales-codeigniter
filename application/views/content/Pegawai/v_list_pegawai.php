<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <a href="<?= site_url(array("Pegawai", "register")) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>
                            &nbsp;&nbsp;ADD DATA PEGAWAI
                        </a> &nbsp;
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table-pegawai" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Alamat Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Jabatan</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pegawais as $pegawai) {
                        ?>
                            <tr id="<?= $pegawai->id_pegawai ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $pegawai->nama_pegawai ?></td>
                                <td><?= $pegawai->alamat_pegawai ?></td>
                                <td><?= getJenisKelaminLengkap($pegawai->jenis_kelamin) ?></td>
                                <td><?= $pegawai->no_telp ?></td>
                                <td><?= getLevel($pegawai->jabatan) ?></td>
                                <td style="text-align:center">
                                    <a href="<?= site_url("Pegawai/update/$pegawai->id_pegawai") ?>" class="btn btn-sm btn-info" data-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" data-id="<?= $pegawai->id_pegawai ?>" id="delete_id" class="btn btn-sm btn-danger tombolHapus">
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
        var table = $('#table-pegawai').DataTable({
            "responsive": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Data Pegawai',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data Pegawai',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Data Pegawai',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
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
                        var url = "Pegawai/proses_hapus/"
                        $.ajax({
                                url: '<?= base_url() ?>' + url + id,
                                type: "POST",
                            })
                            .done(function(id) {
                                $.confirm({
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
                                                window.location.replace("<?= site_url("Pegawai") ?>");
                                            }
                                        },
                                    }
                                });
                            })
                            .fail(function() {
                                $.alert({
                                    theme: 'modern',
                                    icon: 'fa fa-danger',
                                    title: 'Data Tidak bisa dihapus!',
                                    content: 'Data tersebut telah berelasi dengan tabel lain',
                                    closeIcon: true,
                                    boxWidth: '500px',
                                    useBootstrap: false,
                                    type: 'red',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: 'OKE',
                                            btnClass: 'btn-blue',
                                            action: function() {
                                                // window.location.replace("<?= site_url("Barang") ?>");
                                            }
                                        },
                                    }
                                })
                            });
                    }
                },
                close: function() {}
            }
        });
    }
</script>