<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link"> -->
        <!-- <img src="<?php // echo $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    <!-- </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Yii::$app->homeUrl; ?>" class="d-block">
                    <?= Yii::$app->user->identity->username; ?>
                </a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Настройки', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger', 'url' => ['/settings']],
                    ['label' => 'Обратная связь', 'iconClass' => 'nav-icon far fa-circle text-success', 'url' => ['/contact']],
                    ['label' => 'Как мы работаем', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['/job-item']],
                    ['label' => 'Квартиры', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['/apartments']],
                    ['label' => 'Статьи', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['/article']],
                    ['label' => 'Отзывы', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['/review']],
                    ['label' => 'Файлы', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['/uploads']],
                    ['label' => 'Скрипты', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['/script']],
                    ['label' => 'robots.txt', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['/robots']],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],   
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>