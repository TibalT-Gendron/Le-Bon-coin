<?php
   require_once('config/config.php');
   require_once('class/Autoloader.class.php');
   AutoLoader::register();
   $router= new AltoRouter();

   #Creation des routes
   $router->map( 'GET', '/', function() {
    require __DIR__ . '/views/home.php';
	});
?>

