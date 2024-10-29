<?php if (session('validation')) : ?>
    <small class="text-danger">
        <?php foreach (session('validation')->getErrors() as $error) : ?>
            <?= esc($error) ?>
        <?php endforeach ?>
    </small>
<?php endif; ?>