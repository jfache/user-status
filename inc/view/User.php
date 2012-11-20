<?php

namespace view;

class User extends BaseView {

	/**
	 * List all users with statuses view
	 */

	public function list_with_statuses() {

		$user_manager = new \manager\User;

		return $this->render('user-with-statuses.php', array(
			'page_title' => "User's Statuses",
			'users' => $user_manager->get_with_statuses(),
		));
	}

	/**
	 * Renders a login form
	 */

	public function login_form() {

		return $this->render('user-login-form.php', array(
			'page_title' => 'Login',
		));
	}

	/**
	 * Tries to log the User
	 */

	public function login($username, $password) {

		$user = new \User;
		$user->set_username($username);
		$user->set_password($password);

		$user_manager = new \manager\User;

		if(!$user_manager->login($user)) {
			return $this->render('user-incorrect-login.php');
		} else {
			header('location:' . BASE_URL);
		}
	}

	/**
	 * Renders a creation form
	 */

	public function create_form() {

		return $this->render('user-create-form.php', array(
			'page_title' => 'Create Account',
		));
	}

	/**
	 * Create a User Account
	 */

	public function create($username, $password) {

		$user = new \User;
		$user->set_username($username);
		$user->set_password($password, true);

		$user_manager = new \manager\User;
		$user_manager->save($user);

		return $this->render('user-create-confirmation.php', array(
			'page_title' => 'Success!',
		));

	}

	/**
	 * Logout
	 */

	public function logout() {

		session_destroy();

		header('location: ' . BASE_URL);
	}

}