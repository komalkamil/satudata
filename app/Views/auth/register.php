<?= $this->extend('backend_layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md offset-md">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center" style="font-weight: bold;">REGISTER</h4>
                    <hr>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?= validation_list_errors() ?>

                    <?= form_open('register'); ?>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">role</label>
                        <input type="text" name="role" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                    <?= form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>