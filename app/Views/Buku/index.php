<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<a href="/buku/tambah" class="btn btn-primary mb-3">Tambah Buku</a>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Daftar Buku</h1>
        </div>
    </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>

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
        <?php $i = 1; ?>
        <?php foreach ($buku as $row) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['nama_pengarang']; ?></td>
                <td><a href="/buku/<?= $row['slug']; ?>">Detail</a> <a href="/buku/ubah/<?= $row['slug']; ?>">Edit</a> <a href="/buku/hapus/<?= $row['id']; ?>">Hapus</a></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>