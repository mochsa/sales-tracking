<div id="app">
    <section class="section">
        <div class="container mt-0">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand mb-3" style="filter: drop-shadow(4px 5px 4px);">
                        <img src="<?= base_url() ?>/template/assets/img/avatar/logo-1.png" alt="logo" width="110">
                        <div class="mt-3">
                            Sales Tracking
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= site_url('auth/register'); ?>">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="<?= set_value('name'); ?>" autofocus>
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Already have an account? <a href="<?= site_url('auth'); ?>">Create One</a>
                    </div>
                    <div class="simple-footer mb-3">
                        Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="#">Moch Syafrizal Azhar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>