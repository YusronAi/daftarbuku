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
            <form action="/buku/update/<?= $buku['id']; ?>" method="post" enctype="multipart/form-data">
                <!-- Menanganai csrf -->
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $buku['gambar']; ?>">
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

                <!-- gambar input -->
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="gambar" onchange="priviewImg()">
                        <label class="custom-file-label" for="inputGroupFile01"><?= $buku['gambar']; ?></label>
                    </div>
                </div>
                <div class="col-sm-4 col-form-label">
                    <img class="img-priview img-thumbnail" src="\img\<?= $buku['gambar']; ?>" alt="">
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