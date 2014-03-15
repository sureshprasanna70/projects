<!doctype html>

<html>
  
  <head>
    <title>k! Projects</title>
    <meta name="viewport" content="width=device-width">
    <?php if(isset($sendingmeta)){?>
    <meta property="og:title" content="<?php echo $ogtitle;?>" />
    <meta property="og:type" content="<?php echo $ogtype;?>" />
    <meta property="og:url" content="<?php echo $ogurl;?>" />
    <meta property="og:desc" content="<?php echo $ogdesc;?>" />
	<meta property="og:image" content="<?php echo $ogimg;?>" />
    <?}?>

    <link rel="stylesheet" href="<?echo base_url();?>assets/css/bootstrap.min.css">
    
    <script src="<?echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href=<?php echo base_url()."assets/css/style.css";?>>
  </head>
  
  <body>
    <div class="container">
      <div class="navbar navbar-default">
        <div class="container">
          <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a href="<?echo base_url();?>" class="navbar-brand">K! PROJECTS</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav ">


              <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">OVER THE YEARS<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?echo base_url();?>projects/2007">2007</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?echo base_url();?>projects/2008">2008</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?echo base_url();?>projects/2009">2009</a>
                </li>

				<li class="divider"></li>
                <li>
                  <a href="<?echo base_url();?>projects/2010">2010</a>
                </li>
				<li class="divider"></li>
                <li>
                  <a href="<?echo base_url();?>projects/2011">2011</a>
                </li>
				<li class="divider"></li>
                <li>
                  <a href="<?echo base_url();?>projects/2012">2012</a>
                </li>
				<li class="divider"></li>
                <li>
                  <a href="<?echo base_url();?>projects/2013">2013</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?echo base_url();?>projects/2014">2014</a>
                </li>
              </ul>
            </li>
            <li>
                <a href="http://www.kurukshetra.org.in">K !</a>
              </li>
              <?if($this->tank_auth->is_logged_in()){?>
              <li><a href="<?echo base_url()?>/change">EDIT</a></li>
              <?}?>
            </ul>
            </div>
        
    </nav>
    <div class="row">
    <?php if(isset($username)){
      ?>
    <h5 style="float:right">Welcome,<?echo $username;?><br><a href="<?php echo base_url();?>auth/logout">Logout</a></h5>

    <?}?>
  </div>