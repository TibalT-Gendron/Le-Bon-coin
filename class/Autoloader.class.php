<?php
class Autoloader 
{
    static function register(){
        spl_autoload_register(array(__CLASS__, 'my_autoload'));
    }
    static function my_autoload ($classname) {
        if (file_exists('class/'.$classname.'.class.php')) {
        	require('class/'.$classname.'.class.php');
        }else{
        	require('model/'.$classname.'.model.php');
        }
    }
    
}

?>