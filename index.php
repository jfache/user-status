<?php

require_once 'inc/bootstrap.php';

session_start();

// Get Current User
$user = manager\User::get_current_user();

// Determine View
if(isset($_REQUEST['view'])) {
	$view = $_REQUEST['view'];
} else {
	$view = 'user.list_with_statuses'; // Default View
}

// Get Class and Method to call from the $view parameter
list($class, $method) = explode('.', $view);
$class = '\view\\' . ucfirst($class);

// Call
$called_view = new $class($user); // Inject the User directly, to avoid use of global

// View args are specified (in the right order) directly in the REQUEST var
$args = $_REQUEST;
unset($args['view']);

$output = call_user_func_array(array($called_view, $method), $args);

// $output should be filled with a response, we can still decide not to echo it if we want to
echo $output;