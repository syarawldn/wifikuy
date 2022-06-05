<?php $this->load->view('templates/admin/header'); ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Metode Pembayaran</h1>
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
                                                    <h6 class="modal-title" id="custom-width-modalLabel"><i class="fa fa-plus"></i> Tambah metode pembayaran</h6>
                                                </div>
                                                <div class="float-right">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo base_url('metode/create'); ?>" role="form" method="POST">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"> Kode Bank</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="kode_bank" class="form-control" placeholder="Example : MDR001 ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"> Nama Bank</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="nama_bank" class="form-control" placeholder="Example : BANK MANDIRI ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Atas Nama</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="atas_nama" class="form-control" placeholder="Example : Wifikuy">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">No Rekening</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="no_rekening" class="form-control" placeholder="Example : 001122334556">
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
                                                    Tambah metode pembayaran
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
                                                        <th>Kode Bank</th>
                                                        <th>Nama Bank</th>
                                                        <th>No Rekening </th>
                                                        <th>Atas Nama</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($metode as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row->kode_bank ?></td>
                                                            <td><?php echo $row->nama_bank ?></td>
                                                            <td><?php echo $row->no_rekening ?></td>
                                                            <td><?php echo $row->atas_nama ?></td>
                                                            <td>
                                                                <center>

                                                                    <a href="<?php echo base_url("metode/delete/" . $row->id); ?>"></span><i class="material-icons-outlined">delete</a></i>
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