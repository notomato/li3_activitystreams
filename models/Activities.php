<?php

namespace li3_activitystreams\models;

class Activities extends \li3_activitystreams\models\Base {
	
	public $validates = array(
		'id' => array(
			array(
				'notEmpty',
				'message' => 'ID is required.'
			),
			array(
				'length' => 36,
				'message' => 'Must be 36 characters.'
			)
		),
		'application_id' => array(
			array(
				'notEmpty',
				'message' => 'ID is required.'
			),
			array(
				'length' => 36,
				'message' => 'Must be 36 characters.'
			)
		),
		'stream_id' => array(
			array(
				'notEmpty',
				'message' => 'ID is required.'
			),
			array(
				'length' => 36,
				'message' => 'Must be 36 characters.'
			)
		),
		'actor_id' => array(
			array(
				'length' => 36,
				'message' => 'Must be 36 characters.'
			)
		),
		'published' => array(
			array(
				'notEmpty',
				'message' => 'Name is required.'
			)
		),
		'verb' => array(
			array(
				'notEmpty',
				'message' => 'Name is required.'
			)
		),
		'title' => array(
			array(
				'notEmpty',
				'message' => 'Name is required.'
			)
		)
	);
	
	public $hasOne = array(
		'Application',
		'Stream',
		'Actor' => array(
			'to' => 'Objects',
			'key' => array(
				'actor_id' => 'id'
			)
		),
		'Object',
		'Target' => array(
			'to' => 'Objects',
			'key' => array(
				'target_id' => 'id'
			)
		),
	);
	
	protected $_meta = array(
		'key' => 'id'
	);
	
	protected $_schema = array(
		'id'                => array('type' => 'string', 'length' => 36, 'null' => false),
		'application_id'    => array('type' => 'string', 'length' => 36, 'null' => false),
		'stream_id'         => array('type' => 'string', 'length' => 36, 'null' => false),
		'actor_id'          => array('type' => 'string', 'length' => 36, 'default' => null),
		'published'         => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'verb'              => array('type' => 'string', 'length' => 36, 'null' => false),
		'object_id'         => array('type' => 'string', 'default' => null),
		'target_id'         => array('type' => 'string', 'default' => null),
		'values'            => array('name' => 'longtext'),
		'title'             => array('type' => 'string', 'null' => false)
	);
	
	public static function __init() {
		parent::__init();
	}
}

?>