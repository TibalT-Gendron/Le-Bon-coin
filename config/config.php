<?php
define("APP_NAME","LECOINFRANCAIS");
define("APP_DFAULT_DESCRIPTION","Lecoinfrançais est une plateforme de publication d'annonce a nantes");
define("APP_CONTACT_NUMBER","Lecoinfrançais");
define("APP_CONTACT_EMAIL","Lecoinfrançais");
define("APP_LOCATION",$_SERVER['REQUEST_URI']);
define("APP_BASE_URL",$_SERVER['HTTP_HOST']);
define("APP_LOGO","");
define("CONFIG_APP_FAVICON","/file/img/favicon.png");
define("CONFIG_APP_LOGO","/file/img/logo.png");
define("APP_DEFAULT_LANGUE",'FR-fr');
define("APP_DEFAULT_CHARSET",'UTF-8');
define("APP_TIME_FUSEAU","Africa/Porto-novo");
define("CONFIG_APP_SALT", "1svd54F@#5CFECHCBhbsc486.dj*");

define("CONFIG_DB_CONNECT", 'mysql');
define("CONFIG_DB_HOST", 'localhost');
define("CONFIG_DB_PORT", 'xxxxx');
define("CONFIG_DB_NAME", 'lbc');
define("CONFIG_DB_USER", 'root');
define("CONFIG_DB_PASSWORD", '');
define("CONFIG_DB_CHARSET", 'utf8mb4');
define("CONFIG_DB_DATA", 'array');

date_default_timezone_set(APP_TIME_FUSEAU);
session_start();