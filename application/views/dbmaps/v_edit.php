<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url('dbmaps') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1><?= $section; ?></h1>
        </div>

        <div class="card card-primary">
            <div class="row m-0">
                <div class="col-12 col-md-12 col-lg-5 p-0">
                    <div class="card-header text-center">
                        <h4>Add data Maps</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form Input -->
                        <?= form_open('dbmaps/edit/' . $dbmaps->id_maps); ?>
                        <div class="form-group">
                            <label>Nama Maps</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="nama_maps" placeholder="Nama Maps" value="<?= $dbmaps->nama_maps; ?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telpon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-number" name="no_telpon" value="<?= $dbmaps->no_telpon; ?>" placeholder="Nomor Telpon" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="alamat" value="<?= $dbmaps->alamat; ?>" placeholder="Alamat Maps" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="latitude" value="<?= $dbmaps->latitude; ?>" placeholder="Latitude Maps" required readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="longitude" value="<?= $dbmaps->longitude; ?>" placeholder="Longitude Maps" required readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" name="deskripsi" style="height: 100px;" placeholder="..." required><?= $dbmaps->deskripsi; ?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-warning" type="reset" id="toastr-1">Cancel</button>
                        </div>
                        <?= form_close(); ?>
                        <!-- Form Input -->

                    </div>
                </div>
                <!-- Pick Map -->
                <div class="col-12 col-md-12 col-lg-7 p-0">
                    <div class="card">
                        <div class="card-header">
                            <div class="section-title m-0">
                                Pick Map
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tempat Menampilkan Maps -->
                            <?= $map['html']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>