<div class="container">
	<div class="row">
		<h3><?php echo $web_profiles['username']; ?></h3>
		<?php echo anchor('index.php/site/logout', 'Destroy session', "class='btn btn-primary'"); ?>
		<?php echo anchor('index.php/memberarea/site_stats', 'Show site stats', "class='btn btn-primary'"); ?>
	</div>

	<div class="row">
		<h1>Web Properties</h1>
		<div class="col-lg-6">
			<?php echo form_open('', 'id="la-data"'); ?>
			<?php foreach ($web_profiles['items'] as $wp) {?>
				<div class="checkbox">
					<label>
					  <input type="checkbox" name="web_properties[]" value="<?php echo $wp['id'] ?>"> <?php echo $wp['name'] ?>
					</label>
				</div>
			<?php } ?>
			<?php echo form_submit('submit', 'Enviar'); ?>
			<?php echo form_close(); ?>
		</div>
		<div class="col-lg-6">
			<div id="response-container"></div>
		</div>
	</div>
	
</div>
<script type="text/javascript" charset="utf-8">
$( "#la-data" ).submit(function( event ) {
 event.preventDefault();

$.post( "<?php echo base_url() ?>index.php/memberarea/showstats", $( "#la-data" ).serialize(), "json")
.done(function(data) {
	$("#response-container").html(data);
})
.fail(function() {
alert( "error" );
});

});
 
</script>				