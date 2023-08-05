<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $role_name; ?> Dashboard</h1>
        </div>

        <div class="section-body">
            <div id="flash" data-flash="<?= $this->session->flashdata('pesansukses'); ?>"></div>
            <h2 class="section-title">Hi, <?= $user['name']; ?></h2>
            <p class="section-lead">
                Selamat datang di Dashboard Sales Tracking.
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?= base_url('/template/assets/img/avatar/') . $user['image']; ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Tugas</div>
                                    <div class="profile-widget-item-value">3</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Tugas Selesai</div>
                                    <div class="profile-widget-item-value">12</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Total Tugas</div>
                                    <div class="profile-widget-item-value">8</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $user['name']; ?> <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> <?= $role_name; ?>
                                </div>
                            </div>
                            <?= $user['name']; ?> is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2"><?= $user['email']; ?> / Member Since <?= gmdate('d F Y', $user['date_created']); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>