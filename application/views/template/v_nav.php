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
            <?php
            $role_id = $this->session->userdata('role_id');
            $querryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC
                            ";
            $menu = $this->db->query($querryMenu)->result_array();
            ?>

            <!-- Looping Menu -->
            <?php foreach ($menu as $m) : ?>
                <li class="menu-header">
                    <?= $m['menu'] ?>
                </li>

                <!-- Sub Menu -->
                <?php
                $menuId = $m['id'];
                $querrySubMenu = "SELECT *
                                    FROM `user_sub_menu` JOIN `user_menu`
                                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                    WHERE `user_sub_menu`.`menu_id` = $menuId
                                    AND `user_sub_menu`.`is_active` = 1
                                    ";
                $subMenu = $this->db->query($querrySubMenu)->result_array();
                ?>
                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a class="nav-link" href="<?= site_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span>
                        </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </ul>

        <!-- Sidebar Footer -->
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>
                Tugas Akhir
            </a>
        </div>
    </aside>
</div>