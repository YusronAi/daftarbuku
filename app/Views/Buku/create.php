<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Form Tambah Buku</h2>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <form action="/buku/simpan" method="post">
                <!-- Menanganai csrf -->
                <?= csrf_field(); ?>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="teks" id="form1Example1" class="form-control" name="judul" autofocus />
                    <label class="form-label" for="form1Example1">Judul</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="teks" id="form1Example2" class="form-control" name="nama_pengarang" />
                    <label class="form-label" for="form1Example2">Nama Pengarang</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block">Tambah Buku</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>