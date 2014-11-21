<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MyF</title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css" />
<?php $this->cssScripts('bootstrap'); ?>
<?php $this->jsScripts('jquery'); ?>
<?php $this->cssScripts('erasure'); ?>
<?php if($this->info['currentController']=='Main') $this->cssScripts('slider'); ?>
<?php if($this->info['currentController']=='Main') $this->jsScripts('slider'); ?>
<?php //if($this->info['currentController']=='auth') $this->cssScripts('auth'); ?>
<?php if($this->info['currentController']=='comments' or 'weather') $this->cssScripts('comments'); ?>
<?php // $this->cssScripts('auth'); ?>
<!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
<?php $this->cssScripts(); ?>
<?php //$this->jsScripts(); ?>
</head>
<body>
<?php //echo $this->info['currentController']; ?>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">MyF</a></h1>
			<h2>Design by TEMPLATED</h2>
		</div>
		<?php include 'application/views/menu.php'; ?>
		
	</div>
	<?php include 'application/views/'.$content_view; ?>
</div>
<div id="footer">
	&copy; Untitled. All rights reserved. Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.
</div>
</body>
</html>

