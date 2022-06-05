<?php $this->load->view('templates/header'); ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Invoice</h1>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <!-- end row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- sample modal content -->

                                <div class="col-lg-12">
                                    <div class="row">

                                        <div class="table-responsive">
                                            <table id="datatable1" class="display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Invoice.</th>
                                                        <th>Paket </th>
                                                        <th>Tanggal jatuh tempo</th>
                                                        <th>Jumlah</th>
                                                        <th>status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($invoice as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><a href="<?= base_url("invoice/detail/$row->code") ?>" class="btn btn-primary"><i class='material-icons-outlined'>list</i><strong>Detail</strong></a></td>
                                                            <td><?php echo $row->code ?></td>
                                                            <td><?php echo $row->package ?></td>
                                                            <td><?php echo tanggal(date('Y-m-d', strtotime($row->expdate))) ?></td>
                                                            <td>Rp <?php echo number_format($row->price) ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row->status == 'Unpaid') {
                                                                    echo "<span class='btn btn-warning'>Unpaid</span>";
                                                                } else if ($row->status == 'Paid') {
                                                                    echo "<span class='btn btn-success'>Paid</span>";
                                                                }
                                                                ?>
                                                            </td>
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
                    </div>
                </div>

                <!-- end row -->

                <?php $this->load->view('templates/footer'); ?>