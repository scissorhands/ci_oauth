<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Error</title>
	<link rel="stylesheet" href="">
	<style>
		body {
			font-family: Verdana;
			text-align: center;
			color: #4E5A68;
			padding-bottom: 0px;
			padding-top: 50px;
			background: url(http://dev.g4a.mx/dashboard/assets/img/bkg.jpg) repeat;
		}

		h1 {
			font-weight: normal;
			font-size: 2.5em;
		}

		p {
			font-size: 1.4em;
		}
	</style>
</head>
<body>
	<h1><?php echo $heading; ?></h1>
	<p><?php echo $message; ?></p>
</body>
<script>
	setTimeout(function() { window.location = "http://dev.g4a.mx/dashboard/" }, 5000)
</script>
</html>