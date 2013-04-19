<?php

namespace li3_activitystreams\models;

class Activities extends \li3_activitystreams\models\StreamsBase {
	
	protected $_meta = array(
		'key' => 'id'
	);
	
	protected $_schema = array(
		'id'                => array('type' => 'string', 'length' => 32, 'null' => false),
		'application_id'    => array('type' => 'string', 'length' => 32, 'null' => false),
		'stream_id'         => array('type' => 'string', 'length' => 32, 'null' => false),
		'actor_id'          => array('type' => 'string', 'length' => 32, 'default' => null),
		'published'         => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'verb'              => array('type' => 'string', 'length' => 32, 'null' => false),
		'object_id'         => array('type' => 'string', 'default' => null),
		'target_id'         => array('type' => 'string', 'default' => null),
		'values'            => array('name' => 'longtext'),
		'title'             => array('type' => 'string', 'null' => false)
	);
}

?>