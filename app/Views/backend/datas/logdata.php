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
                <div class="activities">

                    <?php foreach ($logs as $r): ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-comment-alt"></i>
                            </div>
                            <div class="activity-detail">
                                <p><?= $r['nm_data']; ?></p>
                                <div class="mb-2">
                                    <span class="text-job text-primary"><?= date('d-m-Y', strtotime($r['created_at'])) ?> || </span>
                                    <span class="text-job text-primary"><?= date('H:i', strtotime($r['created_at'])) ?></span>
                                    <span class="bullet"></span>
                                    <a class="text-job" href="#"><?= $r['penulis']; ?></a>
                                </div>
                                <p><?= $r['pesan']; ?>.</p>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>