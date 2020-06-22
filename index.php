<?php
   require_once('config/config.php');
   require_once('class/Autoloader.class.php');
   AutoLoader::register();
   $router= new AltoRouter();
   $GLOBALS['controller']=new Controller();
   $GLOBALS['database']=new Database();
   #Creation des routes

   $router->map( 'GET', '/', function() {
    $GLOBALS['controller']->initPage("Home","accueil");
	});
   //var_dump($_SERVER['REQUEST_URI']);die;
   $match = $router->match();
   // call closure or throw 404 status
	if( $match && is_callable( $match['target'] ) ) {
		call_user_func_array( $match['target'], $match['params'] );
	} else {
		$GLOBALS['controller']->initPage("404");
	}
?>

