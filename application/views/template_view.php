<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
	<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/2.1.1/jquery.js"></script>
	<?php if($this->info['currentController']=='comments') $this->cssScripts('comments'); ?>
	<?php $this->cssScripts()->jsScripts(); ?>
    <title>MyF</title>
</head>
<body>
	<?php include 'application/views/topmenu.php'; ?>
    <?php include 'application/views/'.$content_view; ?>
</body>
</html>
