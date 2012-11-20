<?php

namespace view;

class Status extends BaseView {

	/**
	 * Creation form
	 */

	public function create_form() {

		return $this->render('status-create-form.php');
	}

	/**
	 * Actual creation
	 */

	public function create($status_content) {

		$status = new \Status();
		$status->set_status_content($status_content);
		$status->set_user($this->current_user);

		$status_manager = new \manager\Status;
		$status_manager->save($status);

		header('location:' . BASE_URL);
	}
}