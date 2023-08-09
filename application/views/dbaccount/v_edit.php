<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $section; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <?= form_open_multipart('dbaccount/edit'); ?>
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-sm-3 col-form-label">Picture</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <img src="<?= base_url('/template/assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>