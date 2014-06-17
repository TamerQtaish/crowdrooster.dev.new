<h2><?= Lang::get('user.register.title') ?></h2>

<form method="POST" action="<?=url('/user/register')?>">
    <b><?= Lang::get('user.register.form.email') ?></b>
    <input name="email" type="text" value="<?= (isset($input['email'])? $input['email'] : '') ?>" />
    <br />

    <b><?= Lang::get('user.register.form.password') ?></b>
    <input name="password" type="password" value="" />
    <br />

    <b><?= Lang::get('user.register.form.password_confirmation') ?></b>
    <input name="password_confirmation" type="password" value="" />
    <br />

    <b><?= Lang::get('user.register.form.first_name') ?></b>
    <input name="first_name" type="text" value="<?= (isset($input['first_name'])? $input['first_name'] : '') ?>" />
    <br />

    <b><?= Lang::get('user.register.form.last_name') ?></b>
    <input name="last_name" type="text" value="<?= (isset($input['last_name'])? $input['last_name'] : '') ?>" />
    <br />

    <b><?= Lang::get('user.register.form.phone') ?></b>
    <input name="phone" type="text" value="<?= (isset($input['phone'])? $input['phone'] : '') ?>" />
    <br />
    
    <input type="checkbox" name="accept_t_and_c" value="1"> <?= Lang::get('user.register.form.accept_t_and_c') ?><br />

    <input type="submit" value="<?= Lang::get('user.register.form.submit') ?>" />
</form>

