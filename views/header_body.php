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
        <a href="#" class="brand-logo center"><img src="<?php echo URL; ?>img/logo.png"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo URL; ?>dashboard">Домой</a></li>
            <?php if (Session::get('loggedIn') == true): ?>
                <li><a href="<?php echo URL; ?>users"><?php echo Session::get('login'); ?></a></li>
                <li><a href="<?php echo URL; ?>dashboard/logout">Выйти</a></li>
            <?php endif; ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="<?php echo URL; ?>dashboard">Домой</a></li>
            <?php if (Session::get('loggedIn') == true): ?>
                <li><a href="<?php echo URL; ?>users"><?php echo Session::get('login'); ?></a></li>
                <li><a href="<?php echo URL; ?>dashboard/logout">Выйти</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>