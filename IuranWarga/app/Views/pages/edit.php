<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<div class="container">
  <a href="/warga" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-square"></i></a>
  <div class="row justify-content-start">
    <h1 class="h3 mb-4 text-dark"><?= $title; ?></h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= session()->getFlashdata('pesan'); ?>
    </div>
    <?php endif; ?>
    <form action="/pages/update/<?= $warga['id']; ?>" method="post">
      <?= csrf_field(); ?>
      <div class="col-6 text-bg-secondary p-3">
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik"
            placeholder="No.KTP" name="nik" value="<?= (old('nik')) ? old('nik') : $warga['nik']; ?>" required>
          <div class="invalid-feedback">
            <?= $validation->getError('nik'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
            placeholder="Nama" name="nama" value="<?= (old('nama')) ? old('nama') : $warga['nama']; ?>">
          <div class=" invalid-feedback">
            <?= $validation->getError('nama'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Jenis Kelamin</label>
          <select class="form-select mb-3 <?= ($validation->hasError('kelamin')) ? 'is-invalid' : ''; ?>"
            aria-label="Default select example" name="kelamin" required>
            <option selected value=""><?= (old('kelamin')) ? old('kelamin') : $warga['kelamin']; ?></option>
            <option value="L">(L) Laki-laki</option>
            <option value="P">(P) Perempuan</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('kelamin'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat"
            rows="3" placeholder="Masuk alamat anda..." name="alamat"
            value=""><?= (old('alamat')) ? old('alamat') : $warga['alamat']; ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('alamat'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="no_rumah" class="form-label">No.
            Rumah</label>
          <input type="number" class="form-control <?= ($validation->hasError('no_rumah')) ? 'is-invalid' : ''; ?>"
            id="no_rumah" placeholder="No rumah" name="no_rumah"
            value="<?= (old('no_rumah')) ? old('no_rumah') : $warga['no_rumah']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('no_rumah'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Status</label>
          <select class="form-select mb-3 <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>"
            aria-label="Default select example" name="status" required>
            <option selected value="">
              <?= (old('status')) ? old('status') : $warga['status']; ?>
            </option>
            <option value="1">(1) Belum Nikah</option>
            <option value="2">(2) Sudah Nikah</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('status'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit Data</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>