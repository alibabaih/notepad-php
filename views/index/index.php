<body class="theme-default page-signin-alt">
<?php //Session::init(); ?>

<div class="signin-header">
    <a href="<?php echo URL; ?>" class="logo"><strong>Ли Вест-НН</strong> Ежедневник</a>
</div>

<h1 class="form-header">Войдите в ваш Аккаунт</h1>

<form action="index/run" method="post" id="signin-form_id" class="panel">
    <div class="form-group">
        <input type="text" name="login" id="username_id" class="form-control input-lg" placeholder="Логин">
    </div>
    <div class="form-group signin-password">
        <input type="password" name="password" id="password_id" class="form-control input-lg" placeholder="Пароль">
        <!--<a href="#" class="forgot">Forgot?</a>-->
    </div>
    <div class="form-actions">
        <input type="submit" value="Войти" class="btn btn-primary btn-block btn-lg">
    </div>
</form>




<!--<p>-->
<!--    <a href="../index">Home</a>-->
<!--    <a href="../login/index">Login</a>-->
<!---->
<!--    --><?php //if (Session::get('loggedIn') == true): ?>
<!--        <a href="--><?php //echo URL; ?><!--dashboard/logout">Logout</a>-->
<!--    --><?php //else: ?>
<!--        <a href="--><?php //echo URL; ?><!--login">Login</a>-->
<!--    --><?php //endif; ?>
<!--</p>-->