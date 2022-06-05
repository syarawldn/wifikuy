<?php $this->load->view('templates/header'); ?>
<?php foreach ($content as $row) : ?>

    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">receipt</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Tagihan anda bulan ini</span>
                                        <?php foreach ($invoice as $data) {



                                        ?>
                                        <?php } ?>
                                        <?php
                                        if ($invoice == true) {
                                            $view = 'Rp ' . number_format($data->price);
                                        } else {
                                            $view = 'Belum ada tagihan ';
                                        }
                                        ?>

                                        <span class="widget-stats-info"><strong><?php echo $view ?></strong></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-success">
                                        <i class="material-icons-outlined">dns</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Layanan anda</span>
                                        <span class="widget-stats-info"><?php echo $row->paket ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php $this->load->view('templates/footer'); ?>