<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $section; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Maps</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('dbmaps/input') ?>" class="btn btn-primary">Add <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Maps</th>
                                            <th>No Telpon</th>
                                            <th>Alamat</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($dbmaps as $key => $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_maps; ?></td>
                                                <td><?= $value->no_telpon; ?></td>
                                                <td><?= $value->alamat; ?></td>
                                                <td><?= $value->latitude; ?></td>
                                                <td><?= $value->longitude; ?></td>
                                                <td><?= $value->deskripsi; ?></td>
                                                <td class="text-center">
                                                    <div class="d-flex">
                                                        <a href="#" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
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