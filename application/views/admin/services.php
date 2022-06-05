<?php $this->load->view('templates/admin/header'); ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Layanan Wifikuy</h1>
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
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="float-left">
                                                    <h6 class="modal-title" id="custom-width-modalLabel"><i class="fa fa-plus"></i> Input Data Paket</h6>
                                                </div>
                                                <div class="float-right">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo base_url('services/create'); ?>" role="form" method="POST">

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"> Paket</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="package" class="form-control" placeholder="Paket Internet 100Mbps">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Harga</label>
                                                        <div class="col-md-12">
                                                            <input type="number" name="price" class="form-control" placeholder="Example : 50000">
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Kembali</button>
                                                        <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fa fa-refresh"></i> Reset</button>
                                                        <button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="add"><i class="fa fa-plus"></i> Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                    Input Paket Baru
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                        <br>
                                        <div class="table-responsive">
                                            <table id="datatable1" class="display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Paket.</th>
                                                        <th>Harga </th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($packages as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row->paket ?></td>
                                                            <td>Rp <?php echo number_format($row->harga) ?></td>
                                                            <td><?php echo $row->status ?></td>
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