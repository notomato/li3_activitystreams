<?php

namespace li3_activitystreams\models;

class Streams extends \li3_activitystreams\models\StreamsBase {
	
	protected $_meta = array(
		'key' => 'id'
	);
	
	protected $_schema = array(
		'id'               => array('type' => 'string', 'length' => 32, 'null' => false),
		'application_id'   => array('type' => 'string', 'length' => 32, 'null' => false),
		'name'             => array('type' => 'string', 'length' => 255, 'default' => null),
		'update_timestamp' => array('type' => 'datetime', 'default' => null),
		'auto_subscribe'   => array('type' => 'boolean')
	);
}

?>