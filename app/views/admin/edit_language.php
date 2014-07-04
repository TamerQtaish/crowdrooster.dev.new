<form action="<?= url('admin/languages/'.$language.'/'.$file.'/save') ?>"  method="POST">
<?php
foreach ($records as $key => $arr):
	if (is_array($arr)): ?>
		<h3><?= $key; ?></h3>
		<?php
		foreach ($arr as $sKey=>$sArr):
			if (!is_array($sArr)):?>
				<b><?=$sKey?></b>
				<input type="text" name="<?= $key.'['.$sKey.']' ?>" value="<?= $sArr ?>" />
				<br />
			<?php
			else:
			?>
				<h3><?=$sKey?></h3>
				<?php						
				foreach ($sArr as $ssKey=>$ssArr):
					if (!is_array($ssArr)):?>
						<b><?=$ssKey?></b>
						<input type="text" name="<?= $key.'['.$sKey.']['.$ssKey.']' ?>" value="<?= $ssArr ?>" />
						<br />
					<?php
					else:
					?>
						<b><?= $ssKey; ?></b>
						<?php
						foreach ($ssArr as $sssKey=>$sssArr):
							if (!is_array($sssArr)): ?>
								<b><?=$sssKey?></b>
								<input type="text" name="<?= $key.'['.$sKey.']['.$ssKey.']['.$sssKey.']' ?>" value="<?= $sssArr ?>" />
								<br />
							<?php
							endif;
						endforeach;
					endif;
				endforeach;
			endif;
		endforeach;
	else:
	?>
		<b><?=$key?></b>
		<input type="text" name="<?= $key ?>" value="<?= $arr ?>" />
		<br />
	<?php
	endif;
endforeach;
?>
<br />
<input type="submit" value="<?= Lang::get('admin.edit_language.form.submit') ?>" />
</form>
		
