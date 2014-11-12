<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
	<?php $this->jsScripts('jquery'); ?>
<!--	<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/2.1.1/jquery.js"></script> -->
	<?php if($this->info['currentController']=='comments' or 'weather') $this->cssScripts('comments'); ?>
	<?php if($this->info['currentController']=='Main') $this->cssScripts('slider'); ?>
	<?php if($this->info['currentController']=='Main') $this->jsScripts('slider'); ?>
	<?php $this->cssScripts()->jsScripts(); ?>
    <title>MyF</title>
</head>
<body>
	<?php include 'application/views/top_menu.php'; ?>
    <?php include 'application/views/'.$content_view; ?>
</body>
</html>
