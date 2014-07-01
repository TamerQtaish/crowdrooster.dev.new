<h2><?= Lang::get('company.register.title') ?></h2>

<form method="POST" action="<?=url('/company/register')?>">

    <b><?= Lang::get('company.register.form.first_name') ?></b>
    <input name="first_name" type="text" value="<?= (isset($input['first_name'])? $input['first_name'] : '') ?>" />
    <br />

    <b><?= Lang::get('company.register.form.last_name') ?></b>
    <input name="last_name" type="text" value="<?= (isset($input['last_name'])? $input['last_name'] : '') ?>" />
    <br />

    <b><?= Lang::get('company.register.form.company_name') ?></b>
    <input name="company_name" type="text" value="<?= (isset($input['company_name'])? $input['company_name'] : '') ?>" />
    <br />

    <b><?= Lang::get('company.register.form.email') ?></b>
    <input name="email" type="text" value="<?= (isset($input['email'])? $input['email'] : '') ?>" />
    <br />

    <b><?= Lang::get('company.register.form.password') ?></b>
    <input name="password" type="password" value="" />
    <br />

    <b><?= Lang::get('company.register.form.password_confirmation') ?></b>
    <input name="password_confirmation" type="password" value="" />
    <br />

    <b><?= Lang::get('company.register.form.phone') ?></b>
    <input name="phone" type="text" value="<?= (isset($input['phone'])? $input['phone'] : '') ?>" />
    <br />
    
    <input type="checkbox" name="accept_t_and_c" value="1"> <?= Lang::get('company.register.form.accept_t_and_c') ?><br />

    <input type="submit" value="<?= Lang::get('company.register.form.submit') ?>" />
</form>

