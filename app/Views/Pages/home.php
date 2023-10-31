<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
        <h1>Home</h1>
        <p><?= $session['nama']; ?></p>
        <p><?= $session['alamat']; ?></p>
        <p><?= $session['password']; ?></p>
        <p><a href="/logout">Logout</a></p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>