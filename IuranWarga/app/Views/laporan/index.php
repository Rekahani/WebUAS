<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead class="table-dark">
        <tr>
          <th scope="col">Bulan</th>
          <th scope="col">Jumlah</th>
        </tr>
      </thead>
      <?php foreach ($bulan as $b => $values) : ?>
      <tbody>
        <td><?= $values->bulan ?></td>
        <?php endforeach; ?>
        <?php foreach ($total as $t => $values) : ?>
        <td>Rp.<?= $values->jumlah; ?>000</td>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>

<?= $this->endSection(); ?>