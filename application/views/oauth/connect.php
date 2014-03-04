<!doctype html>
<html>
<head>
	<title>Connect Oauth</title>
	<script type='text/javascript' src='<?= base_url(); ?>assets/js/pace.min.js'></script>
  <script type='text/javascript' src='<?= base_url(); ?>assets/js/gwt-oauth2.js'></script>
  <style>
  /* Pace.js Loader | Know more @ Techtreat.in */
  .pace .pace-progress {
    background: <?php echo $pbColor ?>;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    height: 3px;
    box-shadow: 0 0 3px #000; 

    -webkit-transition: width 1s;
    -moz-transition: width 1s;
    -o-transition: width 1s;
    transition: width 1s;
  }

  .pace-inactive {
    display: none;
  }
  </style>


  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/img/favicon.png" /> 
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/daterangepicker-bs2.css" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/css/styles.css" /> 
  <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/css/marlon.css" /> 
  <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/css/scissorstyles.css" /> 
  <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/css/profile.css" />
  <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/css/upgrade.css" />
  <link href="<?= base_url(); ?>assets/light/css/lite.css" rel="stylesheet" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
  

    <script type="text/javascript">
      var config = {
           base: "<?php echo base_url(); ?>"
       };
    </script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/retry.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/ajax.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/production.js"></script>
  <!--
  -->
  <script type="text/javascript" src="<?= base_url() ?>assets/js/superpagina.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/maxiclic.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/agendize.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/papelweb.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/dateloader.js"></script>
  <!-- <script type="text/javascript" src="<?= base_url() ?>assets/js/highcharts.js"></script> -->
  <script type="text/javascript" src="<?= base_url() ?>assets/js/highstock/highstock.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/moment.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/datatables.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.tagcloud.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/language.selector.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/sp.selector.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>assets/js/script.js"></script>

  <!-- Help Tutorial -->
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.tooltips.js"></script>
  <link href="<?= base_url(); ?>assets/css/jquery.tooltips.css" rel="stylesheet" />   
</head>
<body>
	<h4>Connecting to oauth</h4>
	<a href="<?php echo $authUrl ?>">Connect</a>

</body>
</html>