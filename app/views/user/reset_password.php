<h2><?= Lang::get('user.reset_password.title') ?></h2>

<form method="POST" action="<?=url('/user/reset_password/'.$token)?>">
    <b><?= Lang::get('user.reset_password.form.password') ?></b>
    <input name="password" type="password" value="" />
    <br />

    <b><?= Lang::get('user.reset_password.form.password_confirmation') ?></b>
    <input name="password_confirmation" type="password" value="" />
    <br />

    <input type="submit" value="<?= Lang::get('user.reset_password.form.submit') ?>" />
</form>

