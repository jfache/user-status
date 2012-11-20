<?php

namespace manager;

class Status extends BaseManager {

	/**
	 * Saves a status
	 */

	public function save(\Status $status) {

		$q = $this->db->prepare('INSERT INTO user_statuses (user_id, status, date_posted)
				VALUES (:user_id, :status, NOW())');

		$q->execute(array(
			':user_id' => $status->get_user()->get_id(),
			':status' => $status->get_status_content(),
		));
	}
}