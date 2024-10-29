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
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <div class="form">
                    <?php $validation =  \Config\Services::validation(); ?>
                    <form action="/backend/datas/save" method="post">

                        <div class="form-group">
                            <label>Nama Data</label>
                            <input type="hidden" name="penulis" id="" value="<?= $userData['name']; ?>">
                            <input type="text" class="form-control " placeholder="Masukan Nama Data" name="nm_data">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Produsen Data</label>
                                    <select class="form-control selectric" name="pusats">
                                        <option>- Pilih Produsen Data -</option>
                                        <?php foreach ($pusats as $r): ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['nm_divisi']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Data</label>
                                    <select class="form-control selectric" name="jenis_data">
                                        <option>- Pilih Jenis Data -</option>
                                        <?php foreach ($jenis_data as $r): ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['jenis_data']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cara Pengumpulan Data</label>
                                    <select class="form-control selectric" name="pengumpulan">
                                        <option value="">- Pilih Pengumpulan Data -</option>
                                        <option value="Pencatatan Manual">Pencatatan Manual</option>
                                        <option value="Pencatatan Aplikasi">Pencatatan Aplikasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Media Pengumpulan Data</label>
                                    <select class="form-control selectric" name="media">
                                        <option value="">- Pilih Media Data -</option>
                                        <option value="Kompilasi Data Unit Kerja">Kompilasi Data Unit Kerja</option>
                                        <option value="Laporan Kemenkeu">Laporan Kemenkeu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Format Data</label>
                                    <select class="form-control selectric" name="format_data">
                                        <option>- Pilih format data -</option>
                                        <?php foreach ($format_data as $r): ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['nm_format']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pembatasan Akses</label>
                                    <select class="form-control selectric" name="akses">
                                        <option value="">- Pilih Akses -</option>
                                        <option value="Terbuka">Terbuka</option>
                                        <option value="Tertutup">Tertutup</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jadwal Pemutakhiran</label>
                                    <select class="form-control selectric" name="pemutakhiran">
                                        <option value="Tahunan">Tahunan</option>
                                        <option value="Bulanan">Bulanan</option>
                                        <option value="Mingguan">Mingguan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="waktu_pengumpulan">Waktu Pengumpulan</label>
                                    <input type="date" class="form-control" name="waktu_pengumpulan" id="waktu_pengumpulan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Periode Daftar Data</label>
                                    <input type="number" name="periode_daftar" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Disagregasi</label>
                                    <select class="form-control selectric" name="disagregasi">
                                        <option>Disagregasi</option>
                                        <?php foreach ($disagregasi as $r): ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['nm_disagregasi']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periode_awal">Periode Awal</label>
                                    <input type="date" class="form-control" name="periode_awal" id="periode_awal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periode_akhir">Periode Akhir</label>
                                    <input type="date" class="form-control" name="periode_akhir" id="periode_akhir">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="penanggung_jawab">Penanggung Jawab</label>
                                    <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kontak_produsen">Kontak Produsen</label>
                                    <input type="text" class="form-control" name="kontak_produsen" id="kontak_produsen">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Prioritas</label>
                                    <select class="form-control selectric" name="prioritas">
                                        <option value="">-Pilih Status Data Prioritas-</option>
                                        <option value="Usulan Data Prioritas">Usulan Data Prioritas</option>
                                        <option value="Non Data Prioritas">Non Data Prioritas</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alasan Data Prioritas</label>
                                    <textarea class="summernote" name="alasan_prio"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi Data</label>
                                    <textarea class="summernote" name="deskripsi"></textarea>
                                </div>
                            </div>
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