<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5 mb-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0"><?= $buku['nama_pengarang']; ?></h6> <span>1 days ago</span>
                        </div>
                    </div>
                    <div class="badge"> <span>Design</span> </div>
                </div>
                <div class="mt-5">
                    <h3 class="heading"><?= $buku['judul']; ?></h3>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="\img\<?= $buku['gambar']; ?>" alt="">
                    </div>
                    <div class="mt-5">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div><br>
                        <form action="/buku/<?= $buku['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus?'); ">Delete</button></form>
                        <div class="mt-3"> <span class="text1"><a href="/buku">
                                    << Kembali</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>