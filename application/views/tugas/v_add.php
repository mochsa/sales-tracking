<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url('tugas') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1><?= $section; ?></h1>
        </div>

        <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
        <div class="card card-primary">
            <div class="row m-0">
                <div class="col-12 col-md-12 col-lg-5 p-0">
                    <div class="card-header text-center">
                        <h4>Add data Maps</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('tugas/add') ?>" method="post">
                            <div class="form-group">
                                <label>Pilih Sales</label>
                                <select class="form-control select2" name="sales" required>
                                    <option value="" disabled selected>-- Pilih Sales --</option>
                                    <?php foreach ($sales as $data) : ?>
                                        <?php if ($data->role_id != 1) : ?>
                                            <option value="<?= $data->id; ?>">
                                                <?= $data->name; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- TOKO 1 & TOKO 2 -->
                            <div class="row">
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 1</label>
                                    <select class="form-control select2" name="toko[1]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 2</label>
                                    <select class="form-control select2" name="toko[2]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- TOKO 3 & TOKO 4 -->
                            <div class="row">
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 3</label>
                                    <select class="form-control select2" name="toko[3]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 4</label>
                                    <select class="form-control select2" name="toko[4]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- TOKO 5 & TOKO 6 -->
                            <div class="row">
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 5</label>
                                    <select class="form-control select2" name="toko[5]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 6</label>
                                    <select class="form-control select2" name="toko[6]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- TOKO 7 & TOKO 8 -->
                            <div class="row">
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 7</label>
                                    <select class="form-control select2" name="toko[7]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 8</label>
                                    <select class="form-control select2" name="toko[8]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- TOKO 9 & TOK 10 -->
                            <div class="row">
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 9</label>
                                    <select class="form-control select2" name="toko[9]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 10</label>
                                    <select class="form-control select2" name="toko[10]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- TOKO 11 -->
                            <div class="row">
                                <div class="form-group col-12 col-md-12 col-lg-6">
                                    <label>Toko 11</label>
                                    <select class="form-control select2" name="toko[11]" required>
                                        <option value="" disabled selected>-- Pilih Rute --</option>
                                        <?php foreach ($toko as $data) : ?>
                                            <option value="<?= $data->id_maps; ?>"><?= $data->nama_maps; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="buttons">
                                    <a href="<?= base_url('tugas'); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-chevron-left"></i> Back</a>
                                    <button type="submit" class="btn btn-primary">
                                        Submit & Cek Route
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-7 p-0">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Pick Maps</h4>
                        </div>
                        <div class="card-body">
                            <!-- Place To Show Maps -->
                            <?= $map['html']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>