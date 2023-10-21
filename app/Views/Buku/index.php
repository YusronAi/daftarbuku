<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
        <h1>Daftar Buku</h1>
        </div>
    </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Nama Pengarang</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td><a href="">Edit</a> <a href="">Hapus</a></td>
    </tr>
  </tbody>
</table>

<?= $this->endSection(); ?>