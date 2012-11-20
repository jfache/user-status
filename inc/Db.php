<?php

/**
 * As much as I hate singleton, this class is one
 */

class Db {

	private static $db;

	public static function getDBO() {
		if(!self::$db) {
			self::$db = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
				\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC));
		}

		return self::$db;
	}

}