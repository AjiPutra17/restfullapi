<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/bootstrap-5.2.2-dist/css/bootstrap.min.css') ?>">

    <!-- CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <!-- JS Jquery -->
    <script type="text/javascript" src="<?= base_url('vendor/js/jquery.js') ?>"></script>

    <!-- JS Bootstrap -->
    <script type="text/javascript" src="<?= base_url('vendor/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('vendor/bootstrap-5.2.2-dist/js/bootstrap.min.js') ?>"></script>

    <!-- JS DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Style -->
    <style>
        .box {
            padding: 10px;
            margin-top: 10px;
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">

            <!-- Button trigger modal tambah-->
            <button type="button" class="btn btn-primary mb-0 mt-3" data-bs-toggle="modal" data-bs-target="#tambahdata">
                Tambah Data
            </button>

            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($buku as $bk) {
                        $isbn = $bk['isbn'];
                        $judul = $bk['judul_buku'];
                        $pengarang = $bk['pengarang'];
                        $tahun = $bk['tahun_terbit'];
                    ?>
                        <tr>
                            <td><?= $isbn ?></td>
                            <td><?= $judul ?></td>
                            <td><?= $pengarang ?></td>
                            <td><?= $tahun ?></td>
                            <td>
                                <!-- Button trigger modal Edit -->
                                <a class="btn btn-success" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editdata" data-isbn="<?= $isbn ?>" data-judul="<?= $judul ?>" data-tahun="<?= $tahun ?>" data-pengarang=" <?= $pengarang ?>">Edit</a>
                                <!-- Delet -->
                                <a class="btn btn-danger" href="<?= base_url('buku/delete/') . $isbn ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahdataLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                echo form_open_multipart('buku/create');
                ?>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" name="isbn" class="form-control" id="isbn">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul_buku" class="form-control" id="judul">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                        <div class="col-sm-10">
                            <input type="text" name="pengarang" class="form-control" id="pengarang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <input type="text" name="tahun_terbit" class="form-control" id="tahun">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="editdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editdataLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                echo form_open('buku/edit/');
                ?>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" name="isbn" class="form-control" id="isbn" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul_buku" class="form-control" id="judul">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                        <div class="col-sm-10">
                            <input type="text" name="pengarang" class="form-control" id="pengarang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <input type="text" name="tahun_terbit" class="form-control" id="tahun">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</body>

<!-- JS DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<!-- JS Bootstrap -->
<script type="text/javascript" src="<?= base_url('vendor/bootstrap-5.2.2-dist/js/bootstrap.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url('vendor/bootstrap-5.2.2-dist/js/bootstrap.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            paging: false,
            info: false,
            order: [
                [1, 'desc']
            ],
        });
        $('#editdata').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#isbn').attr("value", div.data('isbn'));
            modal.find('#judul').attr("value", div.data('judul'));
            modal.find('#pengarang').attr("value", div.data('pengarang'));
            modal.find('#tahun').attr("value", div.data('tahun'));
        });
    });
</script>


</html>