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
                    <?php

                    use Kint\Zval\Value;

                    $validation =  \Config\Services::validation(); ?>
                    <form action="/backend/banners/save" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Banner</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('judul_banner') ? 'is-invalid' : '' ?>" placeholder="Masukan judul" name="judul_banner" value="<?= set_value('judul_banner'); ?>">
                            <?php if (isset($validation) && $validation->hasError('judul_banner')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul_banner') ?>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="form-group">
                            <label>Isi</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('isi') ? 'is-invalid' : '' ?>" placeholder="Masukan isi" name="isi" value="<?= set_value('isi'); ?>">
                            <?php if (isset($validation) && $validation->hasError('isi')): ?>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('isi') ?>
                                </div>
                            <?php endif; ?>
                        </div>


                        <label>Upload Banner</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= isset($validation) && $validation->hasError('path') ? 'is-invalid' : '' ?>" id="path" name="path" value="<?= set_value('path') ?>">
                            <?php if (isset($validation) && $validation->hasError('path')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('path') ?>
                                </div>
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