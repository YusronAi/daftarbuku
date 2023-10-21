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
        <?php $i = 1; ?>
        <?php foreach ($buku as $row) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['nama_pengarang']; ?></td>
                <td><a href="/buku/<?= $row['slug']; ?>">Detail</a> <a href="">Edit</a> <a href="">Hapus</a></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>