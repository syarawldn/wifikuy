<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background">

    </div>
    <div class="app-auth-container">
        <div class="logo">
            <a href="<?php echo base_url(); ?>">Wifi Kuy</a>
        </div>
        </p>
        <div class="p-3">

            <?= $this->session->flashdata('pesan'); ?>


        </div>
        <form action="<?php echo base_url('login/auth_login'); ?>" class="form-horizontal" role="form" method="POST">

            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Username / No Internet</label>
                <input type="text" class="form-control m-b-md" name="username" aria-describedby="username" placeholder="Masukan Username / No Internet">

                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="Password">
            </div>


            <div class="auth-submit">
                <button type="submit" class="btn btn-primary"><i class="material-icons-outlined">login</i> Sign in</button>
            </div>
            <br>

        </form>

        <div class="divider"></div>


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
            timer: 2000
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