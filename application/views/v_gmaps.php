<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $section; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url('user') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Google Maps</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Map</h4>
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