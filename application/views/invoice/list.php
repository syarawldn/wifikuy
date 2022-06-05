<?php $this->load->view('templates/header'); ?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>History Invoice</h1>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php foreach ($invoice as $row) {
                ?>

                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">payment</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Tagihan Anda Bulan <?php echo bulan_indo($row->date); ?></span>
                                        <?php
                                        if ($row->status == 'Unpaid') {
                                            $label = "danger";
                                            $text =  "Belum Terbayar";
                                        } else if ($row->status == "Paid") {
                                            $label = "success";
                                            $text =  "Sudah Terbayar";
                                        }
                                        ?>
                                        <span class="widget-stats-amount"><label class="btn btn-<?php echo $label; ?>"> <?php echo $text; ?></label></span>
                                        <hr>
                                        <a href="<?= base_url("invoice/print/$row->code") ?>" class="btn btn-primary" target="_blank"><i class='material-icons-outlined'>arrow_circle_right</i><strong>Lihat Full Invoice</strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


<?php } ?>

<?php $this->load->view('templates/footer'); ?>