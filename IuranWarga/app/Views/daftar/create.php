<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<?php
$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$timestamp = $dt->format('Y-m-d');
?>

<div class="container">
  <a href="/warga" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-square"></i></a>
  <div class="row">
    <h1 class="h3 mb-4 text-dark"><?= $title; ?></h1>
    <div class="col-6 text-bg-secondary p-3">
      <form action="/daftar/save" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-3">
          <label for="bulan" class="form-label">ID Warga</label>
          <input class="form-control <?= ($validation->hasError('id')) ? 'is-invalid' : ''; ?>" type="number"
            aria-label=" input example" readonly name="warga_id" value="<?= $warga['id']; ?>">
        </div>
        <div class="mb-3">
          <label for="bulan" class="form-label">NIK</label>
          <input class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" type="number"
            aria-label=" input example" readonly name="nik" value="<?= $warga['nik']; ?>">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
          <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>"
            id="exampleFormControlTextarea1" rows="3" placeholder="masukan keterangan"
            name="keterangan"><?= old('keterangan'); ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('keterangan'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input class="form-control" type="text" placeholder=" input" aria-label=" input example" name="tanggal"
            readonly value="<?= $timestamp; ?>">
        </div>
        <div class="mb-3">
          <label for="bulan" class="form-label">Bulan</label>
          <input class="form-control" type="text" placeholder=" input" aria-label=" input example" name="bulan" readonly
            value="<?= date('m'); ?>">
        </div>
        <div class="mb-3">
          <label for="tahun" class="form-label">Tahun</label>
          <input class="form-control" type="text" placeholder=" input" aria-label=" input example" name="tahun" readonly
            value="<?= date('Y'); ?>">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
          <input type="number" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>"
            id="exampleFormControlInput1" placeholder="" name="jumlah" value="<?= old('jumlah'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('jumlah'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Status</label>
          <select class="form-select mb-3 <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>"
            aria-label="Default select example" name="status" required>
            <option selected value="">
              <?= (old('status')) ? old('status') : $warga['status']; ?>
            </option>
            <option value="1">lunas</option>
            <option value="2">belum lunas</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('status'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kas</button>
      </form>
    </div>
    <div class="col-6 text-bg-secondary p-3">
      <h3>Penjelasan</h3>
      <p>
        Masukan id warga sesuai dengan yang ada di daftar warga, berikan keterangan dengan jelas.
        <br>
        Jumlah IURAN warga di isi dengan 3 digit angka pertama nominal.
        Contoh :
        <br>
      <ol>
        <li>Iuran warga Rp.500.000 = 500</li>
        <li>Iuran warga Rp.50.000 = 50</li>
      </ol>
      <br>
      minimal pembayaran satu minggu Rp.10.000 dan maksimal pembayaran Rp.900.000.
      </p>
    </div>
  </div>

</div>


<?= $this->endSection(); ?>