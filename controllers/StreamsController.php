<?php

namespace li3_activitystreams\controllers;

use li3_activitystreams\models\Streams;
use lithium\action\DispatchException;

class StreamsController extends \lithium\action\Controller {

	public function index() {
		$streams = Streams::all();
		return compact('streams');
	}

	public function view() {
		$stream = Streams::first($this->request->id);
		return compact('stream');
	}

	public function create() {
		$stream = Streams::create();

		if (($this->request->data) && $stream->save($this->request->data)) {
			return $this->redirect(array('Streams::view', 'args' => array($stream->id)));
		}
		return compact('stream');
	}

	public function edit() {
		$stream = Streams::find($this->request->id);

		if (!$stream) {
			return $this->redirect('Streams::index');
		}
		if (($this->request->data) && $stream->save($this->request->data)) {
			return $this->redirect(array('Streams::view', 'args' => array($stream->id)));
		}
		return compact('stream');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Streams::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Streams::find($this->request->id)->delete();
		return $this->redirect('Streams::index');
	}
}

?>