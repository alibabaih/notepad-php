<body class="theme-default main-menu-animated">
<script>var init = [];</script>
<!-- Demo script --> <script src="<?php echo URL; ?>assets/demo/demo.js"></script> <!-- / Demo script -->

<div id="main-wrapper">

    <div id="main-navbar" class="navbar navbar-inverse" role="navigation">
        <!-- Main menu toggle -->
        <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">МЕНЮ</span></button>

        <div class="navbar-inner">
            <!-- Main navbar header -->
            <div class="navbar-header">
                <!-- Logo -->
                <a href="<?php echo URL; ?>dashboard" class="navbar-brand"><strong>Ли Вест</strong>-НН</a>
                <!-- Main navbar toggle -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>
            </div>

            <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo URL; ?>dashboard">Главная</a></li>
                        <li><a href="http://liwest-nn.ru" target="_blank">Перейти на сайт Нижегородского "Ли Вест"</a></li>
                        <li><a href="mailto:alibabaih@gmail.com">Задать вопрос разработчику</a></li>
                    </ul>

                    <div class="right clearfix">
                        <ul class="nav navbar-nav pull-right right-navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                                    <img src="<?php echo URL; ?>assets/demo/avatars/1.jpg" alt="">
                                    <span>Ли Вест-НН</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="main-menu" role="navigation">
        <div id="main-menu-inner">
            <div class="menu-content top" id="menu-content-demo">
                <div>
                    <div class="text-bg"><span class="text-slim"><?php echo Session::get('login'); ?></span></span></div>

                    <img src="<?php echo URL; ?>assets/demo/avatars/1.jpg" alt="" class="">
                    <div class="btn-group">
                        <?php if (Session::get('loggedIn') == true): ?>
                            <a href="<?php echo URL; ?>users" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-user"></i></a>
                            <a href="<?php echo URL; ?>dashboard/logout" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
                        <?php endif; ?>
                    </div>
                    <a href="#" class="close">&times;</a>
                </div>
            </div>
            <ul class="navigation">
                <?php if (Session::get('role') != MOSCOW): ?>
                <li>
                    <a href="<?php echo URL; ?>dashboard"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Главная</span></a>
                </li>

                <li class="mm-dropdown">
                    <a href="#"><i class="menu-icon fa fa-archive"></i><span class="mm-text">Номенклатура</span></a>
                    <ul>
                        <li>
                            <a tabindex="-1" href="<?php echo URL; ?>goods"><i class="menu-icon fa fa-tasks"></i><span class="mm-text">Товары</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="<?php echo URL; ?>categories"><i class="menu-icon fa fa-folder"></i><span class="mm-text">Категории</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo URL; ?>reports"><i class="menu-icon fa fa-shopping-cart"></i><span class="mm-text">Финансовые отчёты</span></a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>sold"><i class="menu-icon fa fa-legal"></i><span class="mm-text">Продажи продукции</span></a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>transaction"><i class="menu-icon fa fa-share"></i><span class="mm-text">Транзакции между офисами</span></a>
                </li>
                <li class="mm-dropdown">
                    <a href="#"><i class="menu-icon fa fa-truck"></i><span class="mm-text">Закупка продукции</span></a>
                    <ul>
                        <li>
                            <a tabindex="-1" href="<?php echo URL; ?>bought"><i class="menu-icon fa fa-truck"></i><span class="mm-text">Закупка продукции</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="<?php echo URL; ?>bought/related"><i class="menu-icon fa fa-gift"></i><span class="mm-text">Дополнительно</span></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="mm-dropdown">
                    <a href="#"><i class="menu-icon fa fa-truck"></i><span class="mm-text">Склад</span></a>
                    <ul>
                        <li>
                            <a tabindex="-1" href="<?php echo URL; ?>depot"><i class="menu-icon fa fa-truck"></i><span class="mm-text">Склады в сумме</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="<?php echo URL; ?>depot/mochalova"><i class="menu-icon fa fa-gift"></i><span class="mm-text">Склад П.Мочалова</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="<?php echo URL; ?>depot/oktabrskaya"><i class="menu-icon fa fa-gift"></i><span class="mm-text">Склад Октябрьская</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="https://docs.google.com/document/d/1Y7PyMVz7u1-NQiN1Vz23rkJKgevNrWDAeTvgvHxZd8s/edit?usp=sharing" target="_blank"><i class="menu-icon fa fa-question"></i><span class="mm-text">Памятка</span></a>
                </li>
            </ul>
            <?php if (Session::get('role') == ADMIN): ?>
                <div class="menu-content">

                    <a href="<?php echo URL; ?>analytics" class="btn btn-primary btn-block btn-outline dark">Аналитика</a>
                </div>
            <?php endif; ?>
        </div>
    </div>