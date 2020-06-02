<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('layout/header'); ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>POS</b>Application</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">SIGN IN</p>

                <?php $this->load->view($page) ?>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- Bootstrap 4 -->
    <?php $this->load->view('layout/scriptfooter'); ?>
</body>

</html>