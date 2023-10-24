<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2><?= $judul; ?></h2>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <form action="/buku/update/<?= $buku['id']; ?>" method="post">
                <!-- Menanganai csrf -->
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
                <!-- judul input -->
                <div class="form-outline mb-4">
                    <input type="teks" id="form1Example1" class="form-control" name="judul" value="<?= $buku['judul']; ?>" autofocus />
                    <label class="form-label" for="form1Example1">Judul</label>
                </div>

                <!-- nama pengarang input -->
                <div class="form-outline mb-4">
                    <input type="teks" id="form1Example2" class="form-control" name="nama_pengarang" value="<?= $buku['nama_pengarang']; ?>" />
                    <label class="form-label" for="form1Example2">Nama Pengarang</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block">Ubah Buku</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>