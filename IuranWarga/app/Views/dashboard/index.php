<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<div class="container">
  <h1 class="my-5"><?= $title; ?></h1>

  <div class="row align-items-center">
    <div class="col-4">
      <a href="/warga" class="btn btn-primary">
        <div class="card text-bg-secondary text-center" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Data Warga</h3>
          </div>
        </div>
      </a>
    </div>
    <div class="col-4">
      <a href="/daftar" class="btn btn-primary">
        <div class="card text-bg-secondary text-center" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Daftar KAS Warga</h3>
          </div>
        </div>
      </a>
    </div>
    <div class="col-4">
      <a href="/laporan" class="btn btn-primary">
        <div class="card text-bg-secondary text-center" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Laporan Transaksi</h3>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="row my-5">
    <div class="col-7">
      <div class="card text-bg-secondary">
        <div class="card-header text-bg-secondary">
          <h2>Pengumuman</h2>
        </div>
        <div class="card-body">
          <h5 class="card-title">Judul</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia enim ab quidem saepe
            facere illum minus autem vel. Facere maxime commodi rerum laudantium modi distinctio dolor eos minima
            numquam, aperiam eius deserunt soluta illum itaque suscipit expedita sit iste alias ab dolores, doloremque
            totam sed! Voluptas natus laboriosam unde eum!</p>
        </div>
        <div class="card-body">
          <h5 class="card-title">Judul</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia enim ab quidem saepe
            facere illum minus autem vel. Facere maxime commodi rerum laudantium modi distinctio dolor eos minima
            numquam, aperiam eius deserunt soluta illum itaque suscipit expedita sit iste alias ab dolores, doloremque
            totam sed! Voluptas natus laboriosam unde eum!</p>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>