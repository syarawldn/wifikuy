<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/elements/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Pembayaran</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/datepicker/dcalendar.picker.css">
    <?php $this->load->view('templates/payment/header'); ?>
</head>

<body>

    <!-- navbar -->
    <section class="service-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <!-- Default Card Example -->
                    <div class="card mb-5">
                        <div class="card-header bg-primary text-white" align="center">
                            Invoice: #<?= $data[0]['code']; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Invoice</th>
                                            <th scope="col">Layanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data as $row) { ?>
                                            <tr>
                                                <td scope="row"></td>
                                                <th scope="row"><?= $row['code']; ?></th>
                                                <th scope="row"><?= $row['package']; ?></th>
                                            </tr>
                                        <?php } ?>
                                        <?php $total =  $data[0]['random_price']; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- Default Card Example -->
                    <div class="card">
                        <div class="card-header bg-primary text-white" align="center">
                            Proses Pembayaran
                        </div>
                        <div class="card-body" align="center">
                            <h4>Segera Menyelesaikan Pembayaran Anda</h4><br>
                            <p>Batas waktu pembayaran Anda akan berakhir pada</p>
                            <h1>
                                <p id="expired"></p>
                            </h1>
                            <p>(Sebelum <?php $expired = hari_indo(date('N', strtotime($data[0]['exppay']))) . ', ' . tanggal_indo(date('Y-m-d', strtotime('' . $data[0]['exppay'] . ''))) . ', ' . date('H:i', strtotime($data[0]['exppay']));
                                        echo $expired; ?>)</p>
                            <hr>
                            <div class="medium-title col-12 mb-20">
                                <h4>
                                    <p>Silahkan transfer pembayaran ke nomor rekening berikut ini</p>
                                </h4>
                            </div>
                            <div class="offset-lg-1 col-lg-10 offset-sm-0 col-sm-12">
                                <div class="row">
                                    <div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
                                        <img src="<?= base_url() . $data[0]['photo_bank'] ?>" height="50" width="100" alt="Icon Bank" />
                                    </div>
                                    <div class="col-md-6 col-8 mb-xs-10 rekening-text">
                                        <p><input type="hidden" name="" id="myInput" value="<?= $data[0]['no_rekening']; ?> an <?= $data[0]['atas_nama'] ?>">
                                        <h4 id="myInput"><?= number_format((float)($data[0]['no_rekening']), 0, "-", "-"); ?> an <?= $data[0]['atas_nama'] ?></h4>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 medium-title regular-text mt-20">
                                <h4><b>
                                        <p>Sebesar</p>
                                    </b></h4>
                            </div>
                            <div class="col-12 bigger-title text-orange">
                                <h3>
                                    <p>Rp <?= number_format($total, 0, ',', '.'); ?>,-</p>
                                </h3>
                            </div>
                            <div class="col-14 mt-15 mb-15">
                                <hr>
                                <div class="col-md-8 mt-sm-30">
                                    <h3 class="mb-20">PANDUAN PEMBAYARAN</h3>
                                    <div class="">
                                        <ol class="ordered-list" align="left">
                                            <li>Masukkan Kartu ATM <?= $data[0]['nama_bank']; ?> Anda</li>
                                            <li>Masukan PIN ATM Anda</li>
                                            <li>Pilih Menu Transaksi Lainnya</li>
                                            <li>Pilih menu Transfer dan Ke Rek <?= $data[0]['nama_bank']; ?></li>
                                            <li>Masukkan no rekening <?= $data[0]['nama_bank']; ?> yang dituju</li>
                                            <li>Masukkan Nominal Jumlah Uang yang akan di transfer</li>
                                            <li>Layar ATM akan menampilkan data transaksi anda ,</li>
                                            <li>Jika data sudah benar pilih “YA” (OK)</li>
                                            <li>Selesai (struk akan keluar dari mesin ATM)</li>
                                            <li>Ambil Kartu ATM anda</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <form action="<?php echo base_url() ?>" method="POST">
                                <button style="min-width: 140px;" type="submit" class="btn btn-primary btn-sm">Kembali </button>
                                <a href="<?php echo base_url('invoice'); ?>" style="min-width: 140px;" type="submit" class="btn btn-info btn-sm">Cek History </a>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
    <!-- End banner Area -->
    <!-- start footer Area -->

    <!-- js -->
    <?php $expired1 = tanggal_ing(date('Y-m-d', strtotime($data[0]['exppay']))) . ', ' . date('Y', strtotime($data[0]['exppay'])) . ' ' . date('H:i', strtotime($data[0]['exppay'])) ?>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("<?= $expired1 ?>").getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get todays date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="demo"
            document.getElementById("expired").innerHTML = hours + " Jam : " +
                minutes + " Menit : " + seconds + " Detik ";
            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("expired").innerHTML = "Waktu Pembayaran Selesai";
            }
        }, 1000);
    </script>
    <?php $this->load->view('templates/payment/footer'); ?>

</body>

</html>