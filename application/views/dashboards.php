<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
    <?php $this->view('message') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $barang ?><sup style="font-size: 20px"></sup></h3>
                            <p>Barang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <a href="<?= site_url("Barang") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $pegawai ?></h3>
                            <p>Pegawai</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users nav-icon"></i>
                        </div>
                        <a href="<?= site_url("Pegawai") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $supplier ?></h3>
                            <p>Supplier</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck nav-icon"></i>
                        </div>
                        <a href="<?= site_url("Supplier") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $users ?></h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-users-cog"></i>
                        </div>
                        <a href="<?= site_url("User") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                            <div class="card-header">
                                <h5 style="text-align: center" class="card-title">Report Sales</h5>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="chart">
                                        <canvas id="areaChart" height="200" style="height: 290px;"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title"> Report Stock</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="chart-responsive">
                                                        <canvas id="pieChart" height="105"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white p-0">
                                            <ul class="nav nav-pills flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Stock Out
                                                        <span class="float-right text-danger">
                                                            <i class="fas fa-arrow-down text-sm"></i>
                                                            <?= $stockout ?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Stock In
                                                        <span class="float-right text-success">
                                                            <i class="fas fa-arrow-up text-sm"></i> <?= $stockin ?>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-primary"><i class="fas fa-chart-line"></i></span>
                                        <h5 class="description-header"><?= $transaksi ?></h5>
                                        <span class="description-text">TOTAL TRANSAKSI</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-danger"><i class="fas fa-caret-square-up"></i></span>
                                        <h5 class="description-header"><?= $barangjual ?></h5>
                                        <span class="description-text">BARANG TERJUAL</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-hand-holding-usd"></i></span>
                                        <h5 class="description-header"><?= formatRupiah($pendapatan) ?></h5>
                                        <span class="description-text">PENDAPATAN</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-warning"><i class="fab fa-dropbox"></i></span>
                                        <h5 class="description-header"><?= $stockSisa ?></h5>
                                        <span class="description-text">STOCK TERSISA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h5 class="card-title">Top 5 Item Sales</h5>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:1px;">No.</th>
                                        <th>Nama Barang</th>
                                        <th>Terjual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($topsale as $t) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $t->nama_barang ?></td>
                                            <td style="text-align: center"><span class="badge badge-danger"><?= $t->total_qty ?></span></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-info">
                        <div class="card-header">
                            <h5 class="card-title">Recent Transaksi</h5>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:1px;">No.</th>
                                        <th>No. Transaksi</th>
                                        <th>Kasir</th>
                                        <th>Tanggal</th>
                                        <th style="text-align: center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($recentsale as $t) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $t->no_transaksi ?></td>
                                            <td><?= getLevel($t->level) ?></td>
                                            <td><?= $t->tanggal_transaksi ?></td>
                                            <td style="text-align: right"><?= formatRupiah($t->total_utama) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        var areaPieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var areaChartData = {
            labels: [<?php
                        if (count($trans) > 0) {
                            foreach ($trans as $data) {
                                echo "'" . bulan($data->bulan) . "',";
                            }
                        }
                        ?>],
            datasets: [{
                label: 'Grafik Penjualan',
                backgroundColor: 'rgba(60,141,188,0.9)',
                // borderColor: '#dc3545',
                pointColor: '#dc3545',
                // pointStrokeColor: '#dc3545',
                // pointHighlightFill: '#dc3545',
                // pointHighlightStroke: '#dc3545',
                data: [<?php
                        if (count($trans) >= 0) {
                            foreach ($trans as $data) {
                                echo "'" . $data->totals . "',";
                            }
                        }
                        ?>]
            }, ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            // background: false,
            responsive: true,
            pointRadius: true,
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }

        var areaPieChartData = {
            labels: ['Stock In', "Stock Out"],
            datasets: [{
                // label: 'Digital Goods',
                backgroundColor: ['#28a745', '#dc3545'],
                // borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                // data: [28, 48, 40, 19, 86, 27, 90]
                data: [<?= $stockin ?>, <?= $stockout ?>]
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        });

        var areaPieChart = new Chart(areaPieChartCanvas, {
            type: 'doughnut',
            data: areaPieChartData,
            // options: areaChartOptions
        });
    });
</script>