<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= site_url("welcome") ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- SEARCH FORM
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Dropdown Profile -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user user-menu">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <!-- <i class="far fa-bell"></i> -->
                <img src="<?= base_url() ?>assets/dist/img/user1-128x128.jpg" class="user-image" alt="User Image" />
                <span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->username) ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    <img src="<?= base_url() ?>assets/dist/img/user1-128x128.jpg" class="img-circle" /><br><br>
                    <p> <?= $this->fungsi->user_login()->nama_pegawai ?><br>
                        <small><?= $this->fungsi->user_login()->alamat_pegawai ?></small>
                    </p>
                </span>
                <div class="dropdown-divider"></div>
                <div class="user-footer text-center">
                    <a href="#" class="btn btn-default btn-flat">Profile
                    </a>
                </div>
            </div>
        </li>
    </ul>
</nav>