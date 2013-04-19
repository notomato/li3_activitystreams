<?php

namespace li3_activitystreams\models;

class Applications extends \li3_activitystreams\models\StreamsBase {
	
	protected $_meta = array(
		'key' => 'id'
	);
	
	protected $_schema = array(
		'id'     => array('type' => 'string', 'length' => 32, 'null' => false),
		'name'   => array('type' => 'string', 'length' => 255, 'null' => false),
		'secret' => array('type' => 'string', 'length' => 32, 'null' => false)
	);
}

?>