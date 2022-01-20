<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data["NAMA"] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data["NIM"] ?></h6>
            <p class="card-text">Program Studi : <?= $data["PRODI"] ?></p>
            <a href="<?= BASEURL ?>/user" class="card-link">Kembali</a>
        </div>
    </div>
</div>