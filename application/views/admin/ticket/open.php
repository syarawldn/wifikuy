<?php $this->load->view('templates/admin/header'); ?>
<?php foreach ($ticket as $row) : ?>

    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Tiket Support</h1>
                        </div>
                    </div>
                </div>

                <!-- end row -->
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-comments"></i> Subjek : <?php echo $row->subject; ?></h6>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">

                            <div style="max-height: 400px; overflow: auto;">
                                <div class="alert alert-info alert-white text-right">
                                    <b><?php echo $row->user; ?></b><br /><?php echo nl2br($row->message); ?><br /><i class="text-muted" style="font-size: 10px;"><?php echo $data_ticket['datetime']; ?></i>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea name="message" class="form-control" placeholder="Masukan pesan balasan." rows="3" maxlength="200"></textarea>
                                    </div>
                                </div>
                                <hr />
                                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Ulangi
                                </button>


                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim
                                </button>
                                <br />
                                <br />
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    <?php endforeach ?>

    <?php $this->load->view('templates/admin/footer'); ?>