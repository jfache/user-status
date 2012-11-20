<?php

namespace manager;

class User extends BaseManager {

	/**
	 * Returns the current active user
	 */

	public static function get_current_user() {

		// If we already have a User object in SESSION, return it
		if(isset($_SESSION['user']) && $_SESSION['user'] instanceof \User) {
			return $_SESSION['user'];
		}

		// Else create it
		$_SESSION['user'] = new \User;
		return $_SESSION['user'];
	}

	/**
	 * Login a User
	 */

	public function login(\User $user) {

		$q = $this->db->prepare('SELECT id, username
								FROM user
								WHERE username = :username AND password = :password');
		$q->execute(array(
			':username' => $user->get_username(),
			':password' => $user->get_password(),
		));

		$user_data = $q->fetch();

		if(!$user_data) {

			return false;

		} else {

			$user->set_id($user_data['id']);
			$user->set_username($user_data['username']);

			$_SESSION['user'] = $user;

			return true;
		}
	}

	/**
	 * Save a User
	 */

	public function save(\User $user) {

		if($user->is_registered()) {

			$q = $this->db->prepare('UPDATE user
				SET password = :password
				WHERE id = :user_id');

			$q->execute(array(
				':password' => $user->password,
				':user_id' => $user->id,
			));

		} else {

			$q = $this->db->prepare('INSERT INTO user (username, password)
				VALUES (:username, :password)');

			$q->execute(array(
				':username' => $user->get_username(),
				':password' => $user->get_password(),
			));

		}
	}

	/**
	 * Returns a set of user with their statuses
	 */

	public function get_with_statuses() {

		// The next query is a bit tricky, but it returns the last row of the left join
		$q = $this->db->query('SELECT s.status, s.date_posted, u.username
								FROM user AS u
								JOIN user_statuses AS s ON s.user_id = u.id
								LEFT JOIN user_statuses AS s2 ON s2.user_id = u.id AND s.id < s2.id
								WHERE s2.id IS NULL
								ORDER BY s.date_posted DESC');

		$users = array();

		while($data = $q->fetch()) {

			$status = new \Status;
			$status->set_status_content($data['status']);
			$status->set_date_posted($data['date_posted']);

			$user = new \User();
			$user->set_username($data['username']);
			$user->set_status($status);

			$users[] = $user;
		}

		return $users;
	}
}