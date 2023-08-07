<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $role_name; ?> Dashboard</h1>
        </div>

        <div class="section-body">
            <div id="flash" data-flash="<?= $this->session->flashdata('pesansukses'); ?>"></div>
            <div class="row mt-sm-4">
                <div class="col-12 mb-4">
                    <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="<?= base_url('/template/assets/img/unsplash/google-maps.jpg'); ?>">
                        <div class="hero-inner">
                            <h2>Welcome, <?= $user['name']; ?></h2>
                            <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
                            <div class="mt-4">
                                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>