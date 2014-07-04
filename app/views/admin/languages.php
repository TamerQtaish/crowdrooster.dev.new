<?php
if(!isset($language)):

    if (isset($records) AND count($records) > 0):
    ?>
    
    <p>
        <?= Lang::get('admin.languages.language_selection_description') ?>
    </p>
    
    
    <form method="POST" action="<?=url('/admin/languages')?>">
        <b><?= Lang::get('admin.languages.form.select_language') ?></b>
        <br />
        <br />
        <select name="language">
    <?php
        foreach ($records as $key => $value) :
    ?>
        <option value="<?= $value ?>" ><?= $value ?></option>
    <?php
        endforeach;    
    ?>
        </select>
        <br />
        <br />
        <input type="submit" value="<?= Lang::get('admin.languages.form.submit') ?>" />
    </form>
    <?php
    else:
    ?>
    <p>
        <?= Lang::get('admin.languages.no_languages') ?>
    </p>
    <?php
    endif;
else:
    if (isset($records) AND count($records) > 0):
 ?>
    
    <p>
        <?= Lang::get('admin.languages.file_selection_description') ?>
    </p>
    
    
    <form method="POST" action="<?=url('/admin/languages/'.$language)?>">
        <b><?= Lang::get('admin.languages.form.select_language_file') ?></b>
        <br />
        <br />
        <select name="file">
    <?php
        foreach ($records as $key => $value) :
    ?>
        <option value="<?= $value ?>" ><?= $value ?></option>
    <?php
        endforeach;    
    ?>
        </select>
        <br />
        <br />
        <input type="submit" value="<?= Lang::get('admin.languages.form.submit') ?>" />
    </form>
    <?php
    else:
    ?>
    <p>
        <?= Lang::get('admin.languages.no_languages') ?>
    </p>
    <?php
    endif;
endif;
?>
