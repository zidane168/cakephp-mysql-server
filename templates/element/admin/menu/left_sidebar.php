<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!--  sidebar-background-primary  -->
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

        <?php

        use Cake\Core\Configure;

        echo $this->Html->image('logo.png', array(
            "style" => 'opacity: .8; width: 200px',
            "alt"   => 'Logo',
        ));
        ?>

        <span class="brand-text font-weight-light"> <?php // echo Configure::read('site.name') 
                                                    ?> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                echo $this->Html->image('default.png', array(
                    'class' => 'img-circle elevation-2',
                    "alt"   => 'User Image',
                ));
                ?>
            </div>

            <div class="info">

                <?php
                $Hour = date('G');
                $greeting =  __('good_morning');
                if ($Hour >= 5 && $Hour <= 11) {
                    $greeting =  __('good_morning');
                } elseif ($Hour >= 12 && $Hour <= 13) {
                    $greeting = __('good_afternoon1');
                } elseif ($Hour >= 14 && $Hour <= 18) {
                    $greeting = __('good_afternoon');
                } elseif ($Hour >= 19 || $Hour <= 4) {
                    $greeting = __('good_evening');
                }

                $current_user = $session_administrator['current'];

                if (isset($current_user->name) && !empty($current_user->name)) {
                    $url =  $this->Url->build(['controller' => 'administrators', 'action' => 'editPassword', $current_user->id, 'admin' => true]);
                    $name =  $greeting . " <p class='blue bold'>" .  $current_user->name . "<a href=" . $url . " class='update-password'> <i class='fas fa-key'></i> </a> </p>";
                }
                ?>

                <a href="#" class=""> <?= $name ?> </a>
                <?php if (!empty($current_user['Roles'])) { ?>
                    <?php foreach ($current_user['Roles'] as $role) { ?>
                        <a href="#" class="d-block">
                            <?= $role['name']; ?>
                        </a>
                <?php }
                } ?>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <?php
                if (isset($permissions) && $permissions) {  ?>

                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library 
                    -->

                    <!-- Start Plugin::Administration  -->
                    <?php if ((isset($permissions['Administrators']['view']) && ($permissions['Administrators']['view'] == true)) ||
                        (isset($permissions['Permissions']['view']) && ($permissions['Permissions']['view'] == true)) ||
                        (isset($permissions['Roles']['view']) && ($permissions['Roles']['view'] == true))
                    ) {

                        $menu_open = ' ';
                        $active   =  ' ';
                        $active1  =  ' ';
                        $active11 =  ' ';
                        $active2  =  ' ';
                        $active3  =  ' ';

                        if (
                            $this->request->getParam('controller') == 'Administrators' ||
                            $this->request->getParam('controller') == 'Permissions' ||
                            $this->request->getParam('controller') == 'Roles'
                        ) {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Administrators' && $this->request->getParam('action') == 'index') {
                            $active1  =  ' active';
                        }

                        // if ($this->request->getParam('controller') == 'Administrators' && $this->request->getParam('action') == 'editPassword') {
                        //     $active11  =  ' active';
                        // }

                        if ($this->request->getParam('controller') == 'Permissions') {
                            $active2  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Roles') {
                            $active3  =  ' active';
                        }
                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p> <?= __d('administrator', 'administrator'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'administrators', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('administrator', 'administrators'); ?> </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'permissions', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active2; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('permission', 'permissions'); ?> </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'roles', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active3; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('role', 'roles'); ?> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php } ?>

                    <?php if ((isset($permissions['Companies']['view']) && ($permissions['Companies']['view'] == true))) {

                        $menu_open = ' ';
                        $active  =  ' ';
                        $active1 =  ' ';
                        $active2 =  ' ';
                        $active3 =  ' ';
                        if ($this->request->getParam('controller') == 'Companies') {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                            $active1  =  ' active';
                        }

                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">

                                <i class="nav-icon fas far fa-building"></i>
                                <p> <?= __d('company', 'company'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'companies', 'action' => 'index']); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('company', 'companies'); ?> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php } ?>

                    <?php if ((isset($permissions['Products']['view']) && ($permissions['Products']['view'] == true))) {
                        $menu_open = ' ';
                        $active  =  ' ';
                        $active1 =  ' ';
                        $active2 =  ' ';
                        $active3 =  ' ';
                        $active4 =  ' ';
                        $active5 =  ' ';

                        if (
                            $this->request->getParam('controller') == 'Products'  ||
                            $this->request->getParam('controller') == 'ProductOptions' ||
                            $this->request->getParam('controller') == 'Labels' ||
                            $this->request->getParam('controller') == 'Plugins' ||
                            $this->request->getParam('controller') == 'ProductViolates'
                        ) {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Products') {
                            $active1 =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'ProductOptions') {
                            $active2 =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Labels') {
                            $active3 =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Plugins') {
                            $active4 =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'ProductViolates') {
                            $active5 =  ' active';
                        }

                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">

                                <i class="nav-icon fas fa-car-alt"></i>
                                <p> <?= __d('product', 'product'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'products', 'action' => 'index']); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('product', 'products'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'product_options', 'action' => 'index']); ?>" class="nav-link <?= $active2; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('product', 'product_options'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'labels', 'action' => 'index']); ?>" class="nav-link <?= $active3; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('product', 'labels'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'plugins', 'action' => 'index']); ?>" class="nav-link <?= $active4; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('product', 'plugins'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'product_violates', 'action' => 'index']); ?>" class="nav-link <?= $active5; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('product', 'product_violates'); ?> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset($permissions['AiPairings']['view']) && ($permissions['AiPairings']['view'] == true)) {

                        $menu_open = ' ';
                        $active   =  ' ';
                        $active1  =  ' ';

                        if ( $this->request->getParam('controller') == 'AiPairings' ) {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'AiPairings' && $this->request->getParam('action') == 'index') {
                            $active1  =  ' active';
                        }
                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">
                                <i class="nav-icon fas fa-satellite-dish"></i>
                                <p> <?= __d('product', 'ai_pairing'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'aiPairings', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('product', 'ai_pairings'); ?> </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    <?php } ?>

                    <?php if ((isset($permissions['Members']['view']) && ($permissions['Members']['view'] == true))) {
                        $menu_open = ' ';
                        $active  =  ' ';
                        $active1 =  ' ';
                        $active2 =  ' ';
                        $active3 =  ' ';
                        if ($this->request->getParam('controller') == 'Members') {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                            $active1  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'MemberVerifications') {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                            $active2  =  ' active';
                        }

                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p> <?= __d('member', 'member'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'members', 'action' => 'index']); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('member', 'members'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'member_verifications', 'action' => 'index']); ?>" class="nav-link <?= $active2; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('member', 'member_verifications'); ?> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if ((isset($permissions['AnalystReports']['view']) && ($permissions['AnalystReports']['view'] == true))) {
                        $menu_open = ' ';
                        $active  =  ' ';
                        $active1 =  ' ';
                        $active2 =  ' ';
                        $active3 =  ' ';

                        if (
                            $this->request->getParam('controller') == 'AnalystReports'  ||
                            $this->request->getParam('controller') == 'AnalystReportCategories' ||
                            $this->request->getParam('controller') == 'CppclRecords'
                        ) {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'AnalystReports') {
                            $active1 =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'AnalystReportCategories') {
                            $active2 =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'CppclRecords') {
                            $active3 =  ' active';
                        }

                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">

                                <i class="nav-icon fas fa-database"></i>
                                <p> <?= __d('report', 'analyst_report'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'analyst_reports', 'action' => 'index']); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('report', 'analyst_reports'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'analyst_report_categories', 'action' => 'index']); ?>" class="nav-link <?= $active2; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('report', 'analyst_report_categories'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'cppcl_records', 'action' => 'index']); ?>" class="nav-link <?= $active3; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('report', 'cppcl_records'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                    <?php } ?>

                    <?php if ((isset($permissions['News']['view']) && ($permissions['News']['view'] == true))) {
                        $menu_open = ' ';
                        $active  =  ' ';
                        $active1 =  ' ';
                        $active2 =  ' ';

                        if ($this->request->getParam('controller') == 'News' || 
                            $this->request->getParam('controller') == 'NewsTypes') {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'News') {
                            $active1  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'NewsTypes') {
                            $active2  =  ' active';
                        }

                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p> <?= __d('news', 'news'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'news', 'action' => 'index']); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('news', 'newss'); ?> </p>
                                    </a>
                                </li>
                            </ul>

                             <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'news_types', 'action' => 'index']); ?>" class="nav-link <?= $active2; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('news', 'types'); ?> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset($permissions['Regions']['view']) && ($permissions['Regions']['view'] == true)) {

                        $menu_open = ' ';
                        $active   =  ' ';
                        $active1  =  ' ';
                        $active2  =  ' ';
                        $active3  =  ' ';
                        $active4  =  ' ';

                        if (
                            $this->request->getParam('controller') == 'Regions' ||
                            $this->request->getParam('controller') == 'Districts' ||
                            $this->request->getParam('controller') == 'Subdistricts' ||
                            $this->request->getParam('controller') == 'PriceSettings'
                        ) {
                            $menu_open = ' menu-open';
                            $active  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Regions' && $this->request->getParam('action') == 'index') {
                            $active1  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Districts') {
                            $active2  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'Subdistricts') {
                            $active3  =  ' active';
                        }

                        if ($this->request->getParam('controller') == 'PriceSettings') {
                            $active4  =  ' active';
                        }
                    ?>

                        <li class="nav-item <?= $menu_open; ?>">
                            <a href="#" class="nav-link <?= $active; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> <?= __d('setting', 'setting'); ?> <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'regions', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active1; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('setting', 'regions'); ?> </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'districts', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active2; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('setting', 'districts'); ?> </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'subdistricts', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active3; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('setting', 'subdistricts'); ?> </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $this->Url->build(['controller' => 'price_settings', 'action' => 'index', 'admin' => true]); ?>" class="nav-link <?= $active4; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p> <?= __d('setting', 'price_settings'); ?> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php } ?>

                <?php } ?>

             
            </ul>
        </nav>

        <div class="text-right">
            <label class="environment"> (<?= Configure::read('env'); ?>) </label>
        </div>

        <!-- sidebar-menu -->
    </div>
    <!-- sidebar -->
</aside>