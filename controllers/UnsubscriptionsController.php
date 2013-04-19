<?php

namespace li3_activitystreams\controllers;

use li3_activitystreams\models\Unsubscriptions;
use lithium\action\DispatchException;

class UnsubscriptionsController extends \lithium\action\Controller {

	public function index() {
		$unsubscriptions = Unsubscriptions::all();
		return compact('unsubscriptions');
	}

	public function view() {
		$unsubscription = Unsubscriptions::first($this->request->id);
		return compact('unsubscription');
	}

	public function create() {
		$unsubscription = Unsubscriptions::create();

		if (($this->request->data) && $unsubscription->save($this->request->data)) {
			return $this->redirect(array('Unsubscriptions::view', 'args' => array($unsubscription->id)));
		}
		return compact('unsubscription');
	}

	public function edit() {
		$unsubscription = Unsubscriptions::find($this->request->id);

		if (!$unsubscription) {
			return $this->redirect('Unsubscriptions::index');
		}
		if (($this->request->data) && $unsubscription->save($this->request->data)) {
			return $this->redirect(array('Unsubscriptions::view', 'args' => array($unsubscription->id)));
		}
		return compact('unsubscription');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Unsubscriptions::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Unsubscriptions::find($this->request->id)->delete();
		return $this->redirect('Unsubscriptions::index');
	}
}

?>