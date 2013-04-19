<?php

namespace li3_activitystreams\controllers;

use li3_activitystreams\models\Objects;
use lithium\action\DispatchException;

class ObjectsController extends \lithium\action\Controller {

	public function index() {
		$objects = Objects::all();
		return compact('objects');
	}

	public function view() {
		$object = Objects::first($this->request->id);
		return compact('object');
	}

	public function create() {
		$object = Objects::create();

		if (($this->request->data) && $object->save($this->request->data)) {
			return $this->redirect(array('Objects::view', 'args' => array($object->id)));
		}
		return compact('object');
	}

	public function edit() {
		$object = Objects::find($this->request->id);

		if (!$object) {
			return $this->redirect('Objects::index');
		}
		if (($this->request->data) && $object->save($this->request->data)) {
			return $this->redirect(array('Objects::view', 'args' => array($object->id)));
		}
		return compact('object');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Objects::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Objects::find($this->request->id)->delete();
		return $this->redirect('Objects::index');
	}
}

?>