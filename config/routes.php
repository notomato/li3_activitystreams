<?php

use lithium\net\http\Router;

$controllers = array('activities', 'applications', 'objects', 'subscriptions', 'unsubscriptions');
$methods = array(
	'GET' => 'view', 
	'POST' => 'create', 
	'PATCH' => 'edit', 
	'DELETE' => 'delete'
);
foreach ($controllers as $controller) {
	foreach ($methods as $method => $action) {
		//Router::connect("/$controller", array('http:method' => $method), "$controller::$action");
		//Router::connect("/$controller.{.type}", array('http:method' => $method), "$controller::$action");
	}
	//Router::connect("/$controller/{:id}", array('http:method' => 'GET'), array("$controller::view", 'id' => $id));
}

?>