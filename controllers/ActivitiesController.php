<?php

namespace li3_activitystreams\controllers;

use li3_activitystreams\models\Activities;
use lithium\action\DispatchException;

class ActivitiesController extends \lithium\action\Controller {

	public function index() {
		$activities = Activities::all();
		return compact('activities');
	}

	public function view() {
		$activity = Activities::first($this->request->id);
		return compact('activity');
	}

	public function create() {
		$activity = Activities::create();

		if (($this->request->data) && $activity->save($this->request->data)) {
			return $this->redirect(array('Activities::view', 'args' => array($activity->id)));
		}
		return compact('activity');
	}

	public function edit() {
		$activity = Activities::find($this->request->id);

		if (!$activity) {
			return $this->redirect('Activities::index');
		}
		if (($this->request->data) && $activity->save($this->request->data)) {
			return $this->redirect(array('Activities::view', 'args' => array($activity->id)));
		}
		return compact('activity');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Activities::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Activities::find($this->request->id)->delete();
		return $this->redirect('Activities::index');
	}
}

?>