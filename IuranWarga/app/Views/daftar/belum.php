<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead class="table-dark">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">Nama</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </tbody>
    </table>
  </div>
</div>


<?= $this->endSection(); ?>