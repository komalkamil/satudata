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


                <div class="content">
                    <div class="table table-borderless">
                        <?php foreach ($datas as $r): ?>
                            <table>
                                <tr>
                                    <th>Judul Data</th>
                                    <td>: <?= $r['nm_data']; ?></td>
                                    <th>Pusat</th>
                                    <td>: <?= $r['nm_divisi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Data</th>
                                    <td>: <?= $r['jenis_data']; ?></td>
                                    <th>Format Data</th>
                                    <td>: <?= $r['nm_format']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status Daftar Data</th>
                                    <td>: <div class="btn btn-sm btn-primary"> <?= $r['nama_status']; ?></div>
                                    </td>
                                    <th>Disagregasi</th>
                                    <td>: <?= $r['nm_disagregasi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td>: <?= $r['penulis']; ?></td>
                                    <th>Penanggung Jawab</th>
                                    <td>: <?= $r['penanggung_jawab']; ?></td>
                                </tr>
                                <tr>
                                    <th>Waktu Pengumpulan</th>
                                    <td>: <?= $r['waktu_pengumpulan']; ?></td>
                                    <th>Periode daftar</th>
                                    <td>: <?= $r['periode_daftar']; ?></td>
                                </tr>
                                <tr>
                                    <th>Periode Awal</th>
                                    <td>: <?= $r['periode_awal']; ?></td>
                                    <th>Periode Akhir</th>
                                    <td>: <?= $r['periode_akhir']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status Data Prioritas</th>
                                    <td>: <?= $r['status_prio']; ?></td>
                                    <th>Kontak Produsen</th>
                                    <td>: <?= $r['kontak_produsen']; ?></td>
                                </tr>
                            </table>

                        <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="card ">
            <div class="container">
                <?php foreach ($datas as $r):; ?>
                    <form action="/backend/datas/validasi/<?= $r['slug']; ?>" class="mt-5 mb-5" method="post">
                        <div class="form-group">
                            <?php if ($r['id_status_daftar'] < 5) { ?>
                                <p class=""><?= ($userData['role'] != 'produsen data') ? 'Maaf, aksi harus menunggu status diperiksa produsen data' : ''; ?></p>
                                <div class="">Perbarui Status?</div>
                                <label class="custom-switch mt-2">
                                    <input type="hidden" name="user" id="" value="<?= $userData['id']; ?>">
                                    <input type="checkbox" name="valid" class="custom-switch-input" <?= ($userData['role'] != 'produsen data') ? 'disabled' : ''; ?>>
                                    <span class="custom-switch-indicator"></span><br>
                                    <span class="custom-switch-description">Perbarui</span><br>
                                </label>
                                <div class="form-group">
                                    Pesan :
                                    <input type="text" name="pesan" class="mt-1 form-control" <?= ($userData['role'] != 'produsen data') ? 'disabled' : ''; ?>>
                                </div>
                                <button type="<?= ($userData['role'] != 'produsen data') ? 'button' : 'submit'; ?>" class="btn btn-md btn-primary mt-3 mb-3 d-inline">
                                    Submit
                                </button>
                                <a class="btn btn-md btn-warning" href="/backend/datas/verifikasi_data">Kembali</a>
                            <?php } ?>
                            <?php if ($r['id_status_daftar'] > 4) { ?>
                                <p class=""><?= ($userData['role'] != 'walidata') ? 'Maaf, saat ini aksi hanya bisa dilakukan walidata' : ''; ?></p>
                                <div class="">Perbarui Status?</div>
                                <label class="custom-switch mt-2">
                                    <input type="hidden" name="user" id="" value="<?= $userData['id']; ?>">
                                    <input type="checkbox" name="valid" class="custom-switch-input" <?= ($userData['role'] != 'walidata') ? 'disabled' : ''; ?>>
                                    <span class="custom-switch-indicator"></span><br>
                                    <span class="custom-switch-description">Perbarui</span><br>
                                </label>
                                <div class="form-group">
                                    Pesan :
                                    <input type="text" name="pesan" class="mt-1 form-control" <?= ($userData['role'] != 'walidata') ? 'disabled' : ''; ?>>
                                </div>
                                <button type="<?= ($userData['role'] != 'walidata') ? 'button' :  'submit'; ?>" class="btn btn-md btn-primary mt-3 mb-3 d-inline">
                                    Submit
                                </button>
                                <a class="btn btn-md btn-warning" href="/backend/datas/verifikasi_data">Kembali</a>

                            <?php } ?>

                        </div>
                    </form>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>