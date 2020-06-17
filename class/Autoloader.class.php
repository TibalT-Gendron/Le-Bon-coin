<?php
class Autoloader 
{
    static function register(){
        spl_autoload_register(array(__CLASS__, 'my_autoload'));
    }
    static function my_autoload ($classname) {
        require('class/'.$classname.'.class.php');
    }
    
}

?>