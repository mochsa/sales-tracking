<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $section; ?></h1>
        </div>

        <div class="section-body">
            <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>To Do Task</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Sales</th>
                                            <th>Nama Toko</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($tugas as $key => $row) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $row['sales'] ?></td>
                                                <td>
                                                    <div class="badges">
                                                        <?php foreach ($row['nama_toko'] as $nama_toko) { ?>
                                                            <div class="badge badge-danger"><?= $nama_toko ?></div>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex">
                                                        <a href="<?= base_url('tugas/edit/' . $row['id_user']) ?>" class="btn btn-sm btn-warning mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?= base_url('tugas/delete/' . $row['id_user']) ?>" class="btn btn-sm btn-danger" id="tombol-hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>