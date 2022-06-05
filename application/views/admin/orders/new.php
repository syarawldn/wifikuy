<?php $this->load->view('templates/admin/header'); ?>
<?php
foreach ($query as $row) {
    $this->session->set_userdata('paket', $row->paket);
    $this->session->set_userdata('harga', $row->harga);


?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Form Pelanggan Baru</h1>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Default Card Example -->
                    <!-- Grow In Utility -->

                    <div class="col-lg-12 mb-4">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="mb-3">

                                    <form class="form-horizontal" action="<?php echo base_url('orders/create'); ?>" role="form" method="POST">

                                        <div class="row mb-3">
                                            <label for="paket" class="col-sm-2 col-form-label">Paket</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="package" id="package" value="<?php echo $row->paket ?>" disabled>
                                                <input type="hidden" name="package" value="<?php echo $this->session->userdata('paket'); ?>">

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Nomor Handphone</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="nohp" id="nohp" placeholder="Nomor Handphone">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" name="alamat" id="alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="password" id="password" value="<?php echo $password ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Masa Aktif</label>
                                            <div class="col-sm-10">
                                                <select class="form-control form-control-sm" name="masa" id="masa">
                                                    <option disabled value="" selected>Pilih Masa aktif</option>
                                                    <option value="30">1 Bulan</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="harga" class="col-sm-2 col-form-label">Total Harga</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text text-primary">Rp</span></div>
                                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo number_format($row->harga) ?>" disabled>
                                                    <input type="hidden" name="price" value="<?php echo $this->session->userdata('harga'); ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url('orders') ?>" class="btn btn-secondary">Kembali</a>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    <?php } ?>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/admin/footer'); ?>