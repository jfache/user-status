<?php

namespace view;

abstract class BaseView {

	public function __construct(\User $user) {

		$this->current_user = $user;
	}

	/**
	 * Renders a template
	 */

	public function render($template, $context = array()) {

		extract($context);

		// Make context aware of the current user
		$current_user = $this->current_user;

		ob_start();
		require TPL_DIR . $template;
		$html = ob_get_clean();

		return $html;
	}

}