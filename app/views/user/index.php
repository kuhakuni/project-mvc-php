<div class="container">
    <div class="row mt-3 justify-content-center">
        <h1 class="text-center mb-3">Data User</h1>
        <div class="col-lg-8 col-md-12 d-grid gap-2">
            <ul class="list-group">
                <?php foreach ($data as $dataUser): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center"><?= $dataUser[
                	"NAMA"
                ] ?>
                    <div class="mhs-btn">
                        <a href="<?= BASEURL ?>/user/detail/<?= $dataUser[
	"ID"
] ?>" class="detail badge rounded-pills"><i class="bi bi-eye-fill"></i></a>
                        <a href="" class="edit badge rounded-pills btn-edit" data-id="<?= $dataUser[
                        	"ID"
                        ] ?>" data-bs-toggle="modal" data-bs-target="#insertModal"><i
                                class="bi bi-pencil-fill"></i></a>
                        <a href="<?= BASEURL ?>/user/hapus/<?= $dataUser[
	"ID"
] ?>" class="delete badge rounded-pills btn-delete" data-id="<?= $dataUser[
	"ID"
] ?>"><i class="bi bi-trash-fill"></i></a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <!-- Button trigger modal -->
            <button type="button" class=" btn btn-dark btn-insert" data-bs-toggle="modal" data-bs-target="#insertModal"
                id="btn-insert"> <i class="bi bi-plus"></i> Tambah Data User</button>

            <!-- Modal -->
            <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Tambah Data User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= BASEURL ?>/user/tambah" method="POST" id="form">
                            <div class="modal-body">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" placeholder="John Doe" name="nama"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="nim" class="form-label">Nomor Induk</label>
                                    <input type="number" class="form-control" id="nim" placeholder="55233444555112"
                                        name="nim" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="prodi" placeholder="Kedokteran"
                                        name="prodi" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-gray" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Tambah data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>