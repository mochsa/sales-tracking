<div id="app">
    <section class="section">
        <div class="container mt-0">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand mb-3" style="filter: drop-shadow(4px 5px 4px);">
                        <img src="<?= base_url() ?>/template/assets/img/avatar/logo-1.png" alt="logo" width="110">
                        <div class="mt-3">
                            Sales Tracking
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <div id="flash" data-flash="<?= $this->session->flashdata('pesansukses'); ?>"></div>
                            <div id="flashgagal" data-flashgagal="<?= $this->session->flashdata('pesangagal'); ?>"></div>
                            <form method="POST" action="<?= site_url('auth') ?>">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" autofocus>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="<?= site_url('auth/register'); ?>">Create One</a>
                    </div>
                    <div class="simple-footer mb-1">
                        Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="#">Moch Syafrizal Azhar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>