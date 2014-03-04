<div class="container">
	<div class="row">
		<h3><?php echo $web_properties['username']; ?></h3>
		<?php echo anchor('index.php/site/logout', 'Destroy session', "class='btn btn-primary'"); ?>
		<?php echo anchor('index.php/memberarea/site_stats', 'Show site stats', "class='btn btn-primary'"); ?>
	</div>

	<div class="row">
		<h1>Web Properties</h1>
		<?php echo form_open('index.php/memberarea/showstats', ''); ?>
		<?php foreach ($web_properties['items'] as $wp) {?>
			<?php if (isset($wp['defaultProfileId'])) { ?>
			<div class="checkbox">
				<label>
				  <input type="checkbox" name="web_properties[]" value="<?php echo $wp['defaultProfileId'] ?>"> <?php echo $wp['name'] ?>
				</label>
			</div>
			<?php } ?>
		<?php } ?>
		<?php echo form_submit('submit', 'Enviar'); ?>
		<?php echo form_close(); ?>
	</div>
	
</div>