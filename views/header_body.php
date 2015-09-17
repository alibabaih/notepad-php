<body>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center">NotePad</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="<?php echo URL; ?>dashboard">Main</a></li>
            <?php if (Session::get('loggedIn') == true): ?>
            <li>
                <a href="<?php echo URL; ?>users"><?php echo Session::get('login'); ?></a>
            </li>
            <li>
                <a href="<?php echo URL; ?>dashboard/logout"><i class="material-icons">settings_power</i></a>
            </li><?php endif; ?>
        </ul>
    </div>
</nav>