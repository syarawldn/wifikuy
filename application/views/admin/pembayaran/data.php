<?php $this->load->view('templates/admin/header'); ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Pembayaran Customer</h1>
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
                                                        <th>No Invoice</th>
                                                        <th>Pelanggan.</th>
                                                        <th>Paket </th>
                                                        <th>Harga</th>
                                                        <th>Status</th>
                                                        <th>Tanggal</th>
                                                        <th>Masa Aktif</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($payment as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row->code; ?></td>
                                                            <td><?php echo $row->user; ?></td>
                                                            <td><?php echo $row->package ?></td>
                                                            <td>Rp <?php echo number_format($row->price) ?></td>
                                                            <td><?php echo $row->status ?></td>
                                                            <td><?php echo tanggal($row->date); ?></td>
                                                            <td><?php echo tanggal(date('Y-m-d', strtotime($row->expdate))); ?></td>
                                                            <td>
                                                                <center>

                                                                    <a href="<?php echo base_url("services/delete/" . $row->id); ?>"></span><i class="material-icons-outlined">delete</a></i>
                                                                </center>
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
                <script>
                    $(".flatpickr1").flatpickr();
                </script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                <?php
                if ($this->session->flashdata('message_err')) {
                ?>
                    <script>
                        swal({
                            text: "<?php echo $this->session->flashdata('message_err'); ?>",
                            icon: "error",
                            button: false,
                            timer: 1200
                        });
                    </script>
                <?php
                } else if ($this->session->flashdata('message_success')) {
                ?>
                    <script>
                        swal({
                            text: "<?php echo $this->session->flashdata('message_success'); ?>",
                            icon: "success",
                            button: false,
                            timer: 1200
                        });
                    </script>
                <?php
                }
                ?>
                <?php $this->load->view('templates/admin/footer'); ?>