<?php if (isset($validation) && $validation->hasError('nm_divisi')): ?>
    <div class="invalid-feedback">
        <?= $validation->getError('nm_divisi') ?>
    </div>
<?php endif; ?>