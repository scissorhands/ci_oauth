<div class="container">
	<div class="row">
		<h3><?php echo $web_properties['username']; ?></h3>
		<?php echo anchor('index.php/site/logout', 'Destroy session', "class='btn btn-primary'"); ?>
		<?php echo anchor('index.php/memberarea/site_stats', 'Show site stats', "class='btn btn-primary'"); ?>
	</div>

	<div class="row">
		<h1>Web Properties</h1>
		<?php echo form_open('', 'id="la-data"'); ?>
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
<script type="text/javascript" charset="utf-8">
$( "#la-data" ).submit(function( event ) {
 event.preventDefault();

$.post( "<?php echo base_url() ?>index.php/memberarea/showstats", $( "#la-data" ).serialize())
.done(function(data) {
console.log( data );
})
.fail(function() {
alert( "error" );
});

});
 
</script>				