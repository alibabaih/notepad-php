<body>
<ul id="dropdown1" class="dropdown-content">
    <li><a href="<?php echo URL; ?>dashboard">Домой</a></li>
    <?php if (Session::get('loggedIn') == true): ?>
        <li><a href="<?php echo URL; ?>users"><?php echo Session::get('login'); ?></a></li>
        <li><a href="<?php echo URL; ?>dashboard/logout">Выйти</a></li>
    <?php endif; ?>

</ul>
<nav>
    <div class="nav-wrapper">
        <a href="<?php echo URL; ?>dashboard" class="brand-logo center" style="text-transform: uppercase; text-shadow: 0px 1px 2px rgba(150, 150, 150, 1); color: white; font-weight: 100;">Блокнот</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse" style="padding: 0 15px;"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo URL ?>dashboard/add"><i class="material-icons">note_add</i></a></li>
            <li><a href="<?php echo URL; ?>dashboard"><i class="material-icons">web</i></a></li>
            <?php if (Session::get('loggedIn') == true): ?>
                <li><a href="<?php echo URL; ?>users"><i class="material-icons">perm_contact_calendar</i></a></li>
                <li><a href="<?php echo URL; ?>dashboard/logout"><i class="material-icons">settings_power</i></a></li>
            <?php endif; ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="<?php echo URL ?>dashboard/add"> Добавить запись</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo URL; ?>dashboard">Главная</a></li>
            <?php if (Session::get('loggedIn') == true): ?>
                <li><a href="<?php echo URL; ?>users"><?php echo Session::get('login'); ?></a></li>
                <li><a href="<?php echo URL; ?>dashboard/logout">Выйти</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>