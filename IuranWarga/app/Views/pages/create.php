<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<div class="container">
  <a href="/warga" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-square"></i></a>
  <div class="row justify-content-start">
    <h1 class="h3 mb-4 text-dark"><?= $title; ?></h1>
    <form action="/pages/save" method="post">
      <?= csrf_field(); ?>
      <div class="col-6 text-bg-secondary p-3">
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik"
            placeholder="No.KTP" name="nik" value="<?= old('nik'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nik'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
            placeholder="Nama" name="nama" value="<?= old('nama'); ?>">
          <div class=" invalid-feedback">
            <?= $validation->getError('nama'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Jenis Kelamin</label>
          <select class="form-select mb-3 <?= ($validation->hasError('kelamin')) ? 'is-invalid' : ''; ?>"
            aria-label="Default select example" name="kelamin" required value="<?= old('kelamin'); ?>">
            <option selected>Pilih Jenis kelamin</option>
            <option value="L">Laki - laki</option>
            <option value="P">Perempuan</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('kelamin'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat"
            rows="3" placeholder="Masuk alamat anda..." name="alamat" value=""><?= old('alamat'); ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('alamat'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="no_rumah" class="form-label">No.
            Rumah</label>
          <input type="number" class="form-control <?= ($validation->hasError('no_rumah')) ? 'is-invalid' : ''; ?>"
            id="no_rumah" placeholder="No rumah" name="no_rumah" value="<?= old('no_rumah'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('no_rumah'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Status</label>
          <select class="form-select mb-3 <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>"
            aria-label="Default select example" name="status" required value="<?= old('status'); ?>">
            <option selected>Pilih Status Anda
            </option>
            <option value="1">Belum Nikah</option>
            <option value="2">Sudah Nikah</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('status'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>