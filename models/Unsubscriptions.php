<?php

namespace li3_activitystreams\models;

class Unsubscriptions extends \li3_activitystreams\models\StreamsBase {
	
	protected $_meta = array(
		'key' => 'id'
	);
	
	protected $_schema = array(
		'id'              => array('type' => 'string', 'length' => 32, 'null' => false),
		'application_id'  => array('type' => 'string', 'length' => 32, 'null' => false),
		'stream_id'       => array('type' => 'string', 'length' => 32, 'null' => false),
		'object_id'       => array('type' => 'string', 'length' => 32, 'null' => false)
	);
}

?>