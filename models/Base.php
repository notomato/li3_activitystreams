<?php

namespace li3_activitystreams\models;

class StreamsBase extends \lithium\data\Model {
	
	protected $_meta = array(
		'source' => false
	);


	public static function __init() {
		 // deal with id / _id
	}
}

?>