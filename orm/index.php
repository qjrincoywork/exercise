<?php
$root = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$script_name = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
// define ('__SALT__', 'Fho8G**g&0ds43syK0PKPph&^D64fi7g1k-90`j*G&7IVGD');
define ('__ROOT__', $root.$script_name);
define ('__SITE_NAME__', 'YNS Exercise');
define ('__ROOT_PATH__', realpath($_SERVER['DOCUMENT_ROOT'].'/'.$script_name));
define ('__HOSTNAME__', 'localhost');
define ('__USERNAME__', 'root');
define ('__PASSWORD__', 'vagrant');
define ('__DATABASENAME__', 'yns');
spl_autoload_register(function ($className) {
    
    if (file_exists('System/' . $className . '.php')) { 
        require_once 'System/' . $className . '.php'; 
    }
	else if (file_exists('Controllers/' . $className . '.php')) { 
        require_once 'Controllers/' . $className . '.php'; 
    }
	else if (file_exists('Models/' . $className . '.php')) { 
        require_once 'Models/' . $className . '.php'; 
    }
    else if (file_exists($className . '.php')) {
        require_once $className . '.php'; 
    }
});

new Bootstrap();