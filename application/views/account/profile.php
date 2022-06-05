<?php $this->load->view('templates/header'); ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Pengaturan </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover m-0">
                                    <tbody>
                                        <tr>
                                            <td><b>Nama</b></td>
                                            <td><?= $user['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Username</b></td>
                                            <td><?= $user['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>E-Mail</b></td>
                                            <td><?= $user['email']; ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row m-t-lg">
                                <div class="col">
                                    <a href="<?php echo base_url() ?>admin/setting/<?php echo $this->session->userdata('id') ?>" class="btn btn-primary"><i class="material-icons-outlined">lock</i> Ganti Password </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        });
    </script>
<?php
}
?>

<?php $this->load->view('templates/footer'); ?>