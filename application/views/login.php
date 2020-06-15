<?php $this->view('message') ?>
<form action="<?= site_url('Login/proses') ?>" method="post" id="form-login">
    <div class="input-group mb-3">
        <input type="text" name="email" class="form-control" placeholder="Username atau Email" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="input-group-prepend reveal">
            <button type="button" class="btn btn-default">
                <i class="fas fa-lock"></i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" name="login" id="btn-login" class="btn btn-primary btn-block btn-flat">LOGIN</button>
        </div>
    </div>
</form>
<br>
<script>
    $(function() {
        $(".reveal").on('click', function() {
            console.log($(this).children("i"));
            $(this).find("i").toggleClass("fas fa-unlock-alt fas fa-eye");
            var $pwd = $(this).siblings("input");
            if ($pwd.attr('type') === 'password') {
                $pwd.attr('type', 'text');
            } else {
                $pwd.attr('type', 'password');
            }
        });
        $("#btn-login").on("click", function() {
            let validate = $("#form-login").valid();
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
                $("#form-login").submit();
            }
        });
        $("#form-login").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 5,
                }
            },
            messages: {
                username: {
                    required: "Anda belum memasukan username",
                },
                password: {
                    required: "Anda belum memasukkan password",
                    minlength: "Password kurang"
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