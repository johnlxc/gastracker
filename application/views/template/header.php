<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gas Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <?php echo link_tag('assets/css/bootstrap.css');?>
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <?php echo link_tag('assets/css/bootstrap-responsive.css');?>
    <?php echo link_tag('assets/css/main.css');?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28579713-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo site_url();?>">Gas Track</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><?=anchor('main/about', 'About', 'title="About"');?></li>
              <?if($this->tank_auth->is_logged_in()):?>
              <li><?=anchor('track/index', 'Stats', 'title="Stats"');?></li>
              <li><?=anchor('track/add', 'Track', 'title="Add Record"');?></li>
              <li><?=anchor('track/all', 'All', 'title="All Records"');?></li>
              <li><?=anchor('auth/logout/', 'Logout', 'title="Logout"');?></li>
              <?else:?>
              <li><?=anchor('auth/login', 'Login', 'title="Login"');?></li>
              <?endif;?>
            </ul> 
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">

    <?//Sections for displaying alerts?>
    <?if($this->session->userdata('success')):?>
      <div class="alert alert-success">
        <a class="close" data-dismiss="alert">x</a>
        <h4 class="alert-heading">Success!</h4>
        <?=getSuccess()?>
      </div> 
    <?endif;?>

    <?if($this->session->userdata('error')):?>
      <div class="alert alert-error">
        <a class="close" data-dismiss="alert">x</a>
        <h4 class="alert-heading">Error!</h4>
        <?=getError()?>
      </div> 
    <?endif;?>