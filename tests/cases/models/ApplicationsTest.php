<?php

namespace li3_activitystreams\tests\cases\models;

use li3_activitystreams\models\Applications;

class ApplicationsTest extends \lithium\test\Unit {
	
	public function setUp() {
		
	}
	
	public function tearDown() {
		
	}
	
	public function testSomething() {
		$activity = Applications::create(array('name' => 'test'));
		var_dump($activity->data());
		var_dump($activity->validates());
		//var_dump($activity->errors());
		//var_dump($activity->save());
	}
}

?>