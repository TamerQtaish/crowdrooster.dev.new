<h2><?= Lang::get('user.forgot_password.title') ?></h2>

<p>
    <?= Lang::get('user.forgot_password.description') ?>
</p>

<form method="POST" action="<?=url('/user/forgot_password')?>">
    <b><?= Lang::get('user.forgot_password.form.email') ?></b>
    <input name="email" type="text" value="<?= (isset($input['email'])? $input['email'] : '') ?>" />
    <br />

    <input type="submit" value="<?= Lang::get('user.forgot_password.form.submit') ?>" />
</form>
