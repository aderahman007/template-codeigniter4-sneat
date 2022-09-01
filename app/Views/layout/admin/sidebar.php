<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= site_url('admin') ?>" class="app-brand-link">
            <img src="<?= base_url() ?>/writable/images/sistem/<?= sistem()->logo; ?>" alt="" width="30px" height="50px">
            &nbsp;&nbsp;
            <?= strtoupper(sistem()->nama); ?>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?= (isset($active) && $active === 'dashboard') ? 'active' : '' ?>">
            <a href="<?= base_url() ?>/admin" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        
        <!-- Menu  -->

        <!-- Master data -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        <li class="menu-item <?= (isset($active) && $active === 'users') ? 'active' : '' ?>">
            <a href="<?= site_url('admin/users'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Analytics">Manajemen Users</div>
            </a>
        </li>
        <li class="menu-item <?= (isset($active) && $active === 'manajemen_sistem') ? 'active' : '' ?>">
            <a href="<?= site_url('admin/sistem'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Analytics">Manajemen Sistem</div>
            </a>
        </li>
    </ul>
</aside>