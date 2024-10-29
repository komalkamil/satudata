<?= $this->extend('backend_layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header text-primary">
                <i class="fas fa-bell"></i>
                <span class="mx-2" style="font-size: 16px;">Master Pusat</span>
            </div>
            <div class="card-body">

                <div class="form">
                    <?php $validation =  \Config\Services::validation(); ?>
                    <form action="/backend/masterpusats/save" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Pusat</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('nm_divisi') ? 'is-invalid' : '' ?>" placeholder="Masukan Nama Pusat" name="nm_divisi" value="<?= set_value('nm_divisi') ?>">
                            <?php if (isset($validation) && $validation->hasError('nm_divisi')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nm_divisi') ?>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="form-group">
                            <label>Akronim Pusat</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('akronim') ? 'is-invalid' : '' ?>" placeholder="Masukan AKronim Pusat" name="akronim" value="<?= set_value('akronim') ?>">
                            <?php if (isset($validation) && $validation->hasError('akronim')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('akronim') ?>
                                </div>
                            <?php endif; ?>
                        </div>


                        <label>Upload Logo</label>
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