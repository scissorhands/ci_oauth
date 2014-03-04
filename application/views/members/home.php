<div class="container">
	<div class="row">
		<?php echo anchor('index.php/site/logout', 'Destroy session', "class='btn btn-primary'"); ?>
		<?php echo anchor('index.php/memberarea/site_stats', 'Show site stats', "class='btn btn-primary'"); ?>
	</div>

	<div class="row">
		<?php print "<h1>Accounts</h1><pre>" . print_r($accounts, true) . "</pre>"; ?>
	</div>
	
</div>