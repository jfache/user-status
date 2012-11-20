<?php

class Status {

	protected $status;
	protected $user;
	protected $date_posted;

	/**
	 * Sets status
	 */

	public function set_status_content($status) {

		$this->status = $status;
	}

	/**
	 * Returns status
	 */

	public function get_status_content() {

		return $this->status;
	}

	/**
	 * Sets User
	 */

	public function set_user(\User $user) {

		$this->user = $user;
	}

	/**
	 * Returns User
	 */

	public function get_user() {

		return $this->user;
	}

	/**
	 * Returns date posted
	 */

	public function get_date_posted() {

		return $this->date_posted;
	}

	/**
	 * Set date posted
	 */

	public function set_date_posted($date) {

		$this->date_posted = $date;
	}
}