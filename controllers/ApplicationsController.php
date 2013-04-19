<?php

namespace li3_activitystreams\controllers;

use li3_activitystreams\models\Applications;
use lithium\action\DispatchException;

class ApplicationsController extends \lithium\action\Controller {

	public function index() {
		$applications = Applications::all();
		return compact('applications');
	}

	public function view() {
		$application = Applications::first($this->request->id);
		return compact('application');
	}

	public function create() {
		$application = Applications::create();

		if (($this->request->data) && $application->save($this->request->data)) {
			return $this->redirect(array('Applications::view', 'args' => array($application->id)));
		}
		return compact('application');
	}

	public function edit() {
		$application = Applications::find($this->request->id);

		if (!$application) {
			return $this->redirect('Applications::index');
		}
		if (($this->request->data) && $application->save($this->request->data)) {
			return $this->redirect(array('Applications::view', 'args' => array($application->id)));
		}
		return compact('application');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Applications::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Applications::find($this->request->id)->delete();
		return $this->redirect('Applications::index');
	}
}

?>