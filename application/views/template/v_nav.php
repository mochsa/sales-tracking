<div class="main-sidebar">
    <aside id="sidebar-wrapper">

        <!-- Menu Logo Maximize -->
        <div class="sidebar-brand">
            <a href="<?= site_url() ?>">
                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/logo-1.png" class="w-25 mt-1">
                <div>Sales Tracking</div>
            </a>
        </div>

        <!-- Menu Logo Minimize -->
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= site_url() ?>">
                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/logo-1.png" class="rounded-circle h-75 mt-1">
            </a>
        </div>

        <!-- Main Menu Sidebar -->
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>
            <li class="active"><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class=""><a class="nav-link" href="<?= site_url('gmaps') ?>"><i class="fas fa-map-marker-alt"></i><span>Google Maps</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i><span>Database</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Database Account</a></li>
                    <li><a class="nav-link" href="<?= base_url('dbmaps') ?>">Database Maps</a></li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Footer -->
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>Tugas Akhir
            </a>
        </div>
    </aside>
</div>