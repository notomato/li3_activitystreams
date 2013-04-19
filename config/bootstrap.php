<?php

use lithium\util\Validator;

Validator::add('uniqueName', function($value, $format, $options) {
	$model = "\\" . $options['model'];
	//return !(boolean) $model::first(array('conditions' => array('name' => $options['values']['name'])));
	return true;
});


?>