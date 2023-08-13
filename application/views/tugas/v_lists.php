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
                            <h4>List Tugas</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('tugas/add') ?>" class="btn btn-primary">Add <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama Tugas</th>
                                            <th>Members</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Semarang Timur</td>
                                            <td>
                                                <img alt="image" src="<?= base_url(); ?>template/assets/img/avatar/avatar-5.png" class="bunder" data-toggle="tooltip" title="Wildan Ahdian">
                                            </td>
                                            <td><a href="#" class="btn btn-success">Detail</a></td>
                                        </tr>
                                        </tr>
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