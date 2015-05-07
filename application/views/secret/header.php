<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $menu ?> - Admin Control Panel</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?php echo base_url('css/font-awesome.css'); ?>" rel="stylesheet">
    
    <link href="<?php echo base_url('css/adminia.css'); ?>" rel="stylesheet"> 
    <link href="<?php echo base_url('css/adminia-responsive.css'); ?>" rel="stylesheet"> 
    
    <link href="<?php echo base_url('css/pages/dashboard.css'); ?>" rel="stylesheet">    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
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
      
      <a class="brand" ><img style="border:0px;" src="<?php echo base_url(); ?>img/mini-logo.png"></a>
      <div class="nav-collapse">	
	<ul class="nav pull-right">	  
	  <li class="dropdown">
		  
	    <a data-toggle="dropdown" class="dropdown-toggle " href="#">
		    <?php echo $user->nama; ?> <b class="caret"></b>							
	    </a>
	    
	    <ul class="dropdown-menu">
		    <li>
			<a href="<?php echo site_url('secret/profil'); ?>"><i class="icon-user"></i> Profil  </a>
		    </li>
		    
		    <li class="divider"></li>
		    
		    <li>
			    <a href="<?php echo site_url('secret/login/out'); ?>"><i class="icon-off"></i> Logout</a>
		    </li>
	    </ul>
	  </li>
	</ul>
	      
      </div> <!-- /nav-collapse -->
	    
    </div> <!-- /container -->
	  
  </div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div id="content">
	
  <div class="container">
	  
    <div class="row">
	    
      <div class="span3">
	
	<ul id="main-nav" class="nav nav-tabs nav-stacked">
		
	  <li <?php if($menu == 'Home') echo 'class="active"'; ?>>
		  <a href="<?php echo site_url('secret/home'); ?>">
			  <i class="icon-home"></i>
			  Dashboard 		
		  </a>
	  </li>
	  
	  <li <?php if($menu == 'Kategori') echo 'class="active"'; ?>>
		  <a href="<?php echo site_url('secret/kategori'); ?>">
			  <i class="icon-list"></i>
			  Kategori	
		  </a>
	  </li>
	  
	  <li <?php if($menu == 'Loker') echo 'class="active"'; ?>>
		  <a href="<?php echo site_url('secret/loker'); ?>">
			  <i class="icon-star"></i>
			  Lowongan	
		  </a>
	  </li>
	  	  	  	  
	  <li>
		  <a href="<?php echo site_url('admin/login/out'); ?>">
			  <i class="icon-off"></i>
			  Logout	
		  </a>
	  </li>
		
	</ul>	
	
	<hr />
	
	<div class="sidebar-extra">
		<p>Loker Greatnesia.com - Admin area.</p>
	</div> <!-- .sidebar-extra -->
	
	<br />

      </div> <!-- /span3 -->