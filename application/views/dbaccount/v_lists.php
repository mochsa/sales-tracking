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
                            <h4>Data Account</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Email</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($dbaccount as $dbac) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $no++; ?>
                                                </td>
                                                <td>
                                                    <?= $dbac['name']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <img alt="image" src="<?= base_url('/template/assets/img/profile/') . $dbac['image']; ?>" class="bunder" width="35">
                                                </td>
                                                <td>
                                                    <?= $dbac['email']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= gmdate('d F Y', $dbac['date_created']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="badge <?= $dbac['role_id'] === '1' ? 'badge-primary' : 'badge-light' ?>">
                                                        <?= $dbac['role']; ?>
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