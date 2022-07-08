<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    </div>
    <div class="col-4">
      <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-primary" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
      </div>
      <?php endif; ?>
    </div>
    <div class="col-4">
      <form action="" method="GET">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="masukan NIK pencarian..." name="keyword" autofocus>
          <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
  </div>

  <div class="row justify-content-between">
    <div class="col-4">
      <a href="/pages/create" class="btn btn-primary mb-3">Tambah Data Warga</a>
    </div>
    <div class="col-4">
      <p>L = Laki - Laki <br> P = Perempuan</p>
    </div>
    <div class="col-4">
      <p>1 = Belum Menikah <br> 2 = Sudah Menikah</p>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead class="table-dark">
        <tr class="text-center">
          <th scope="col">NO</th>
          <th scope="col">NIK</th>
          <th scope="col">Nama</th>
          <th scope="col">L/P</th>
          <th scope="col">Alamat</th>
          <th scope="col">No.Rumah</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 + (10 * ($currentPage - 1)); ?>
        <?php foreach ($daftar as $d) : ?>
        <tr class="text-center">
          <th scope="row" class="table-dark"><?= $i++; ?></th>
          <td><?= $d['nik']; ?></td>
          <td><?= $d['nama']; ?></td>
          <td><?= $d['kelamin']; ?></td>
          <td><?= substr($d['alamat'], 0, 15); ?></td>
          <td>No. <?= $d['no_rumah']; ?></td>
          <td>
            <a href="/pages/<?= $d['nik']; ?>" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
            <a href="/pages/edit/<?= $d['nik']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>

            <form action="/pages/<?= $d['id']; ?>" method="post" class="d-inline">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin..?');"><i
                  class="bi bi-trash3"></i></button>
            </form>
            <a href="/pages/kas/<?= $d['nik']; ?>" class="btn btn-secondary"><i class="bi bi-wallet2"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <span class="text-center"><?= $pager->links('warga', 'warga_pagination'); ?></span>

  </div>

</div>

<?= $this->endSection(); ?>