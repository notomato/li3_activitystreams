<?php

namespace li3_activitystreams\tests\cases\models;

use li3_activitystreams\models\Activities;

class ActivitiesTest extends \lithium\test\Unit {
	
	public function setUp() {
		
	}
	
	public function tearDown() {
		
	}
	
	public function testSomething() {
		$activity = Activities::create(array('name' => 'test'));
		var_dump($activity->validates());
	}
}

?>