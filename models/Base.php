<?php

namespace li3_activitystreams\models;

use lithium\util\String;

class Base extends \lithium\data\Model {
	
	protected $_schema = array(
		'source' => false
	);
	
	public static function __init() {
		parent::__init();
		static::applyFilter('create',function($self, $params, $chain) {
			if (empty($params['data']['id'])) {
				$params['data']['id'] = String::uuid();
            }
            return $chain->next($self, $params, $chain);
		});
	}
}

?>