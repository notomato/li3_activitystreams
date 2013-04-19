<?php

namespace li3_activitystreams\controllers;

use li3_activitystreams\models\Subscriptions;
use lithium\action\DispatchException;

class SubscriptionsController extends \lithium\action\Controller {

	public function index() {
		$subscriptions = Subscriptions::all();
		return compact('subscriptions');
	}

	public function view() {
		$subscription = Subscriptions::first($this->request->id);
		return compact('subscription');
	}

	public function create() {
		$subscription = Subscriptions::create();

		if (($this->request->data) && $subscription->save($this->request->data)) {
			return $this->redirect(array('Subscriptions::view', 'args' => array($subscription->id)));
		}
		return compact('subscription');
	}

	public function edit() {
		$subscription = Subscriptions::find($this->request->id);

		if (!$subscription) {
			return $this->redirect('Subscriptions::index');
		}
		if (($this->request->data) && $subscription->save($this->request->data)) {
			return $this->redirect(array('Subscriptions::view', 'args' => array($subscription->id)));
		}
		return compact('subscription');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Subscriptions::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Subscriptions::find($this->request->id)->delete();
		return $this->redirect('Subscriptions::index');
	}
}

?>