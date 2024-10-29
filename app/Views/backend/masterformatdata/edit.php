<?= $this->extend('backend_layout/layout'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header text-primary">
                <i class="fas fa-bell"></i>
                <span class="mx-2" style="font-size: 16px;"><?= $header; ?></span>
            </div>
            <div class="card-body">
                <div class="form">
                    <form action="/backend/masterformatdatas/update/<?= $format_data['id']; ?>" method="post">
                        <div class="form-group">
                            <label>Nama Format Data</label>
                            <input type="hidden" name="id" id="" value="<?= $format_data['id']; ?>">
                            <input type="hidden" name="slug" id="" value="<?= $format_data['slug']; ?>">
                            <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Format Data" name="format_data" value="<?= $format_data['nm_format']; ?>">
                            <?php if (session('validation')) : ?>
                                <small class="text-danger">
                                    <?php foreach (session('validation')->getErrors() as $error) : ?>
                                        <?= esc($error) ?>
                                    <?php endforeach ?>
                                </small>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> <span class="mx-2" style="font-size: 16px;">Save</span>
                        </button>
                        <button type="reset" class="btn btn-warning">
                            <i class="fas fa-arrow-rotate-right"></i> <span class="mx-2" style="font-size: 16px;">Reset</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>