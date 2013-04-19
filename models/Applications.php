<?php

namespace li3_activitystreams\models;

use lithium\util\String;
use li3_activitystreams\models\Streams;

class Applications extends \li3_activitystreams\models\Base {
	
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
		'name' => array(
			array(
				'notEmpty',
				'message' => 'Name is required.'
			),
			array(
				'uniqueName',
				'message' => 'Name must be unique.'
			)
		),
		'secret' => array(
			array(
				'notEmpty',
				'message' => 'Secret is required.'
			),
			array(
				'length' => 36,
				'message' => 'Must be 36 characters.'
			)
		),
	);
	
	protected $_meta = array(
		'key' => 'id'
	);
	
	protected $_schema = array(
		'id'     => array('type' => 'string', 'length' => 36, 'null' => false),
		'name'   => array('type' => 'string', 'length' => 255, 'null' => false),
		'secret' => array('type' => 'string', 'length' => 36, 'null' => false)
	);
	
	public static function __init() {
		parent::__init();
		static::applyFilter('create',function($self, $params, $chain) {
			if (empty($params['data']['secret'])) {
				$params['data']['secret'] = bin2hex(String::random(16));
            }
            return $chain->next($self, $params, $chain);
		});
		static::finder('getApplicationByIdAndSecret', function($self, $params, $chain) {
			// Do stuff
			$data = $chain->next($self, $params, $chain);
			return $data ?: null;
		});
	}
	
	public function createStream($application, $stream, array $values = array()) {
		$data = array('name' => $stream, 'application_id' => $application->id);
		return Streams::create($data + $values);
	}
}

?>