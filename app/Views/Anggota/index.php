<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="input-group">
    <form action="" method="post">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="keyword" />
        <button type="submit" class="btn btn-outline-primary" name="submit">search</button>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 + (4 * ($currentPage - 1)); ?>
        <?php foreach ($anggota as $row) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>

                <td>
                    <div><?= $row['nama']; ?>
                </td>
                <td><?= $row['alamat']; ?></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $pager->links('anggota', 'anggota_pagination'); ?>
<?= $this->endSection(); ?>