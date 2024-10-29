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
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-append">

                            <button class="btn btn-rounded btn-primary" type="button">
                                <a href="/backend/datas/create" class="text-white" style="text-decoration: none;"><i class="fas fa-add"></i> <span class="mx-2" style="font-size: 16px;">Tambah</span></a>
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
                    <thead style="font-weight: bold;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Data</th>
                            <th scope="col">Jenis Data</th>
                            <th scope="col">Format Data</th>
                            <th scope="col">Master Pusat</th>
                            <th scope="col">Status Daftar Data</th>
                            <th scope="col">Dibuat Oleh</th>
                            <th scope="col">Logs Data</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($datas as $r): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $r['nm_data']; ?></td>
                                <td><?= $r['jenis_data']; ?></td>
                                <td><?= $r['nm_format']; ?></td>
                                <td><?= $r['nm_divisi']; ?></td>
                                <td><?= $r['nama_status']; ?></td>
                                <td><?= $r['penulis']; ?></td>
                                <td><a href="/backend/logsdata/<?= $r['id']; ?>" class="btn btn-sm btn-primary">Logs Data</a></td>
                                <td class="" style="white-space: nowrap;">
                                    <a href="/backend/datas/verifikasi/<?= $r['slug']; ?>" class="btn btn-sm btn-warning "><i class="fas fa-eye"></i></a>
                                    <?php if ($r['penulis'] == $userData['name']) : ?>
                                        <a href="" class="btn btn-sm btn-primary"><i class="fas fa-pencil"></i></a>
                                    <?php endif ?>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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