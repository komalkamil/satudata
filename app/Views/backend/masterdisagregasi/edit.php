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
                    <form action="/backend/masterdisagregasis/update/<?= $disagregasi['id']; ?>" method="post">
                        <div class="form-group">
                            <label>Nama Disagregasi</label>
                            <input type="hidden" name="id" id="" value="<?= $disagregasi['id']; ?>">
                            <input type="hidden" name="slug" id="" value="<?= $disagregasi['slug']; ?>">
                            <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Disagregasi" name="nm_disagregasi" value="<?= $disagregasi['nm_disagregasi']; ?>">
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