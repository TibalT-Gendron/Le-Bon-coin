<?php
   require_once('config/config.php');
   require_once('class/Autoloader.class.php');
   AutoLoader::register();
   $router= new AltoRouter();
   $GLOBALS['controller']=new Controller();
   $GLOBALS['database']=new Database();
   #Creation des routes
   //accueil mapping
   $router->map( 'GET|POST', '/', function() {
    $GLOBALS['controller']->initPage("Home","accueil");
	});
   //login mapping
   $router->map( 'GET|POST', '/compte', function() {
    $GLOBALS['controller']->initPage("Login","display");
	});
   //profile mapping
   $router->map( 'GET|POST', '/profile', function() {
    $GLOBALS['controller']->initPage("Profile","display");
	});
   $router->map( 'GET|POST', '/profile-[*:typeof]', function($typeof) {
   	$GLOBALS["typeof"]=$typeof;
    $GLOBALS['controller']->initPage("Profile","display");
	});

   //deconnexion
   $router->map( 'GET', '/deconnexion', function() {
    $GLOBALS['controller']->initPage("Login","logout");
	});
   //inscription mapping
   $router->map( 'GET|POST', '/inscription', function() {
    $GLOBALS['controller']->initPage("Login","registerpage");
	});
   //var_dump($_SERVER['REQUEST_URI']);die;
   $match = $router->match();
   // call closure or throw 404 status
	if( $match && is_callable( $match['target'] ) ) {
		call_user_func_array( $match['target'], $match['params'] );
	} else {
		$GLOBALS['controller']->initPage("404","notfound");
	}
?>

