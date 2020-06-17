<!DOCTYPE html>
<html lang="<?=APP_DEFAULT_LANGUE?>">
<head>
    <?php require_once('view/header.php') ?>
</head>
<body>
    <?php 
    	require_once('view/navbar.php');
    	require_once 'view/'.$pagename.'_vue.php';
    	require_once('view/js.php');
    ?>
</body>
</html>