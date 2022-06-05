<?php $this->load->view('templates/header'); ?>
<?php foreach ($history as $row) {

    $this->session->set_userdata('price', $row->price);


?>

    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Payment #<?php echo $row->code ?> </h1>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('invoice/pembayaran/' . $row->code) ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Paket</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row->package ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Jumlah yang harus dibayar </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="Rp <?php echo number_format($row->price) ?>" disabled>
                                                <input type="hidden" name="price" value="<?php echo $row->price ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                                            <div class="col-sm-10">
                                                <select class="form-control form-control-sm" name="metode" id="metode" required>
                                                    <option disabled value="" selected>Pilih metode pembayaran</option>
                                                    <?php foreach ($bank as $row) { ?>
                                                        <option value="<?php echo $row['nama_bank'] ?>"><?php echo $row['nama_bank']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class='material-icons-outlined'>payment</i>Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php $this->load->view('templates/footer'); ?>