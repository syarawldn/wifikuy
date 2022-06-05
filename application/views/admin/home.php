<?php $this->load->view('templates/admin/header'); ?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard Admin </h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-primary">
                                    <i class="material-icons-outlined">person</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Pelanggan</span>
                                    <span class="widget-stats-info">Total Pelanggan</span>
                                    <span class="widget-stats-info"><?php echo $this->db->count_all('customer') ?> Pelanggan </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-success">
                                    <i class="material-icons-outlined">credit_card</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Pembayaran</span>
                                    <span class="widget-stats-info"><?php echo $paid  ?> Pembayaran ( Sudah Terbayar )</span>
                                    <span class="widget-stats-info"><?php echo $unpaid ?> Pembayaran ( Belum Terbayar )</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-danger">
                                    <i class="material-icons-outlined">email</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Tiket</span>
                                    <span class="widget-stats-info"><?php echo $close; ?> Tiket ( Selesai ) </span>
                                    <span class="widget-stats-info"><?php echo $pending; ?> Tiket ( Pending ) </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/admin/footer'); ?>