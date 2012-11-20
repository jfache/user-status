<?php

require_once 'config.php';

/**
 * Setup Environement
 */

define('TPL_DIR', 'tpl/');

function clio_loader($class) {

	$path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$file = dirname(__FILE__) . "/{$path}.php";

	if(file_exists($file)) {
		include_once $file;
	}
}

spl_autoload_register('clio_loader');