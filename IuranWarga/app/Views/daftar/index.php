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
          <input type="text" class="form-control" placeholder="masukan nama pencarian..." name="keyword" autofocus>
          <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-2">
      <a href="/laporan" class="btn btn-primary mb-3">Laporan</a>
    </div>
    <div class="col-3">
      <a href="/daftar/belum" class="btn btn-primary mb-3">Belum Bayar KAS</a>
    </div>
    <div class="col-2 text-end">
      <h4>TOTAL :</h4>
    </div>
    <div class="col-2">
      <?php foreach ($total as $t => $values) : ?>
      <input class="form-control" type="text" value="Rp. <?= $values->jumlah ?>000" aria-label="readonly input example"
        readonly>
      <?php endforeach; ?>
    </div>
  </div>



  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead class="table-dark">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">Nama</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kas as $k => $value) : ?>
        <tr>
          <th scope="row" class="table-dark text-center"><?= $i++; ?></th>
          <td><?= $value->nama ?></td>
          <td><?= substr($value->keterangan, 0, 50) ?></td>
          <td><?= $value->tanggal ?></td>
          <td>Rp. <?= $value->jumlah ?>.000</td>
          <td>
            <form action="/daftar/<?= $value->id ?>" method="post" class="d-inline">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin..?');"><i
                  class="bi bi-trash3"></i></button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>


  </div>
</div>

<?= $this->endSection(); ?>