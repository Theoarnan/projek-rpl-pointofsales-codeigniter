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
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <a href="<?= site_url(array("Barang")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                                    KEMBALI
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-barang" enctype="multipart/form-data" method="post" action="<?= site_url('Barang/proses_simpan') ?>" role="form">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" value="<?= $barangs->nama_barang ?>" id="nama-barang" name="nama_barang" placeholder="Enter ..." required>
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?= $barangs->harga_barang ?>" id="harga-barang" name="harga_barang" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kemasan</label>
                                        <select id="jenis_kemasan" name="kemasan_barang" class="form-control" style="width: 100%;" required>
                                            <option value="<?= $barangs->kemasan_barang ?>" <?= $barangs->kemasan_barang != null ? "selected" : 'Pilih Kemasan' ?>><?= $barangs->kemasan_barang != null ? $barangs->kemasan_barang : 'Pilih Kemasan'  ?></option>
                                            <!-- <option class="" value="">Pilih Kemasan</option> -->
                                            <option value="PCS">PCS</option>
                                            <option value="Kardus">Kardus</option>
                                            <option value="Karung">Karung</option>
                                            <option value="Satuan">Satuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Kategori</label>
                                        <select id="select-kategori" class="form-control" name="kategori" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            <?php
                                            foreach ($kategories as $kategori) { ?>
                                                <option value="<?= $kategori->id_kategori ?>" <?= $kategori->id_kategori == $barangs->kategori_id ? "selected" : null ?>><?= $kategori->nama_kategori ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gambar_barang">File Gambar</label>
                                        <!-- <div class="input-group"> -->
                                        <div class="custom-file">
                                            <input type="file" value="<?= $barangs->gambar_barang ?>" class="form-control" id="gambar_barang" name="gambar">
                                            <label class="custom-file-label" for="gambar_barang">Choose file</label>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Masukkan kode barcode</label>
                                        <input type="text" class="form-control" value="<?= $barangs->barcode_barang ?>" id="barcode-barang" name="barcode" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Barang</label>
                                <textarea type="text" class="form-control" rows="3" value="" id="detail-barang" name="detail_barang" required><?= $barangs->detail_barang ?></textarea>
                            </div>
                            <div class="card-footer text-center">
                                <button id="btn-save-barang" type="submit" name="<?= $pages ?>" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;SIMPAN DATA</button>&nbsp;&nbsp;
                                <button id="btn-reset" type="reset" class="btn btn-info btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;RESET DATA</button>
                            </div>
                            <input type="hidden" id="id" name="id_barang" value="<?= $barangs->id_barang; ?>" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Image Preview</h2>
                    </div>
                    <div class="card-body">
                        <div class="imgWrap">
                            <?php if ($pages == 'updates') {
                                if ($barangs->gambar_barang != null) { ?>
                                    <img id="imgView" alt="User Avatar" class="card-img-top img-fluid" src='<?= base_url('images/barang/' . $barangs->gambar_barang) ?>' onerror="this.onerror=null;this.src='<?= base_url() . "images/no_image.png" ?>';" alt="<?= $barangs->gambar_barang ?>">
                                <?php
                                }
                            } else { ?>
                                <img src="<?= base_url(); ?>assets/dist/img/no-image-icon.png" alt="User Avatar" id="imgView" class="card-img-top img-fluid">
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script>
    $(function() {
        $("#select-kategori").select2({
            theme: 'bootstrap4'
        })
        $("#jenis_kemasan").select2({
            theme: 'bootstrap4'
        })
    })

    // <!-- //Buat Preview Image -->
    $("#gambar_barang").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#gambar_barang").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#gambar_barang").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView').attr('src', e.target.result);
                $('#imgView').hide();
                $('#imgView').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd() {
        fadeInAlert();
    }

    function fadeInAlert(text) {
        $(".alert").text(text).addClass("loadAnimate");
    }

    $(function() {
        $("#btn-save-barang").on("click", function() {
            let validate = $("#form-barang").valid();
            if (validate) {
                $("#form-barang").submit();
            }
        });
        $("#form-barang").validate({
            rules: {
                nama_bar: {
                    required: true
                },
                harga_bar: {
                    required: true,
                    digits: true,
                },
                jk: {
                    required: true
                },
                detail_bar: {
                    required: true
                },
                barcode_bar: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                nama_bar: {
                    required: "Anda belum masukan nama barang",
                },
                harga_bar: {
                    required: "Anda belum masukkan harga barang",
                    digits: "Yang anda masukkan bukan angka!"
                },
                jk: {
                    required: "Anda belum memasukkan jenis kemasan"
                },
                detail_bar: {
                    required: "Anda belum memasukkan deskripsi barang"
                },
                barcode_bar: {
                    required: "Anda belum memasukkan kode barcode",
                    minlength: "Kode Barang minimal 5 karakter"
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