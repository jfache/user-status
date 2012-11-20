<?php

class User {

	protected $id;
	protected $username = 'Guest';
	protected $password;
	protected $status;

	/**
	 * Returns username
	 */

	public function get_username() {

		return $this->username;
	}

	/**
	 * Returns md5ied password
	 */

	public function get_password() {

		return $this->password;
	}

	/**
	 * Returns last status
	 */

	public function get_status() {

		return $this->status;
	}

	/**
	 * Sets last status
	 */

	public function set_status(\Status $status) {

		$this->status = $status;
	}

	/**
	 * Is user logged in?
	 * @return boolean
	 */

	public function is_registered() {

		return $this->id > 0;
	}

	/**
	 * Sets password
	 */

	public function set_password($password, $plain = true) {

		if($plain) {
			$password = md5($password);
		}

		$this->password = $password;
	}

	/**
	 * Sets username
	 */

	public function set_username($username) {

		$this->username = $username;
	}

	/**
	 * Sets ID
	 */

	public function set_id($id) {

		$this->id = (int) $id;
	}

	/**
	 * Returns ID
	 */

	public function get_id() {

		return $this->id;
	}
}