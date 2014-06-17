<h2><?= Lang::get('user.login.title') ?></h2>

<form method="POST" action="<?=url('/user/login')?>">
    <b><?= Lang::get('user.login.form.email') ?></b>
    <input name="email" type="text" value="<?= (isset($input['email'])? $input['email'] : '') ?>" />
    <br />

    <b><?= Lang::get('user.login.form.password') ?></b>
    <input name="password" type="password" value="" />
    <br />

    <input type="checkbox" name="remember_me" value="1"> <?= Lang::get('user.login.form.remember_me') ?>
    <input type="submit" value="<?= Lang::get('user.login.form.submit') ?>" />
</form>

