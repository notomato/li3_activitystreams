<?php

namespace li3_activitystreams\models;

class Objects extends \li3_activitystreams\models\Base {
	
	protected $_meta = array(
		'key' => 'id'
	);
	
	protected $_schema = array(
		'id'              => array('type' => 'string', 'length' => 32, 'null' => false),
		'application_id'  => array('type' => 'string', 'length' => 32, 'null' => false),
		'object_type'     => array('type' => 'string', 'length' => 255, 'default' => null),
		'url'             => array('type' => 'string', 'length' => 255, 'default' => null),
		'values'          => array('name' => 'longtext')
	);
	
	public function getStream();
	
	public function subscribeToStream();
	
	public function unsubscribeFromStream();
}

?>