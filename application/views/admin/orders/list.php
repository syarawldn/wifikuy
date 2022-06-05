<?php $this->load->view('templates/admin/header'); ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>List Pesanan</h1>
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

                                        <br>
                                        <div class="table-responsive">
                                            <table id="datatable1" class="display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>User.</th>
                                                        <th>Paket </th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($content as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><a href="<?= base_url("orders/detail/$row->oid") ?>" class="btn btn-primary"><i class='material-icons-outlined'>
                                                                        list
                                                                    </i><strong>Lihat Data</strong></a></td>
                                                            <td><?php echo $row->user ?></td>
                                                            <td><?php echo $row->paket ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row->status == 'Active') {
                                                                    echo "<span class='btn btn-success'><i class='material-icons-outlined'>
                                                                    verified
                                                                    </i>Active</span>";
                                                                } else if ($row->status == 'Isolir') {
                                                                    echo "<span class='btn btn-danger'><i class='material-icons-outlined'>
                                                                    cancel
                                                                    </i>Isolir</span>";
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