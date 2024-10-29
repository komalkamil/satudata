<?= $this->extend('backend_layout/layout'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                </div>
            <?php endif ?>
            <div class="card-header text-primary">
                <i class="fas fa-bell"></i>
                <span class="mx-2" style="font-size: 16px;"><?= $header; ?></span>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <button class="btn btn-rounded btn-primary" type="button">
                                <a href="/backend/masterformatdatas/create" class="text-white" style="text-decoration: none;"><i class="fas fa-add"></i> <span class="mx-2" style="font-size: 16px;">Tambah</span></a>
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search"></i> <span class="mx-2" style="font-size: 16px;">Cari</span>
                            </button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered my-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Status</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diupdate</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($format_data as $r): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $r['nm_format']; ?></td>
                                <td><?= $r['penulis']; ?></td>
                                <td><?= $r['created_at']; ?></td>
                                <td><?= $r['updated_at']; ?></td>
                                <td>
                                    <a href="/backend/masterformatdatas/edit/<?= $r['slug']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-pencil"></i></a>
                                    <form action="/backend/masterformatdatas/<?= $r['id']; ?>" class="d-inline" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>