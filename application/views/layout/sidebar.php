<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <h3 class="text-app"><strong>POS</strong>
            <italic>Application</italic>
        </h3>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block"><?= $this->fungsi->user_login()->nama_pegawai ?>&nbsp;&nbsp;<i class="fa fa-circle text-success"></i></a>
                <!-- <a class="d-block"><i class="fa fa-circle text-success"></i> Online</p> -->
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar sidebar-dark-lightblue nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="<?= site_url('Welcome') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('barang') ?>" class="nav-link">
                                    <i class="fas fa-box-open nav-icon"></i>
                                    <p>Data Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('Kategori') ?>" class="nav-link">
                                    <i class="nav-icon fab fa-buffer"></i>
                                    <p>Data Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('pegawai') ?>" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Data Pegawai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('supplier') ?>" class="nav-link">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Data Supplier</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comments-dollar"></i>
                        <p>
                            Master Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('Transaksi') ?>" class="nav-link">
                                <i class="fas fa-donate nav-icon"></i>
                                <p>Data Transaksi</p>
                            </a>
                            <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <a href="<?= site_url("Stocks") ?>" class="nav-link">
                                <i class="fas fa-dolly nav-icon"></i>
                                <p>Data Stock</p>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </li>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <li class="nav-item has-treeview">
                    <a href="<?= site_url("Laporan") ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url(array("Transaksi", "app")) ?>" class="nav-link">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>
                                Aplikasi Transaksi
                            </p>
                        </a>
                    </li>
                </ul>
            </ul>
            <br>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
                <li class="nav-header">OTHER MENU</li>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <li class="nav-item has-treeview">
                            <a href="<?= site_url('User') ?>" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    User Management
                                </p>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url('Login/logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>