<?php

namespace manager;

abstract class BaseManager {

	public function __construct() {

		$this->db = \Db::getDBO();
	}

}