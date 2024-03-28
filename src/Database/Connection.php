<?php

namespace AdaiasMagdiel\Sputnik\Database;

use AdaiasMagdiel\Sputnik\Config;
use PDO;

class Connection
{
	private static ?PDO $connection = null;

	public static function getConnection(): PDO
	{
		if (self::$connection === null) {
			self::$connection = new PDO(Config::$dsn, Config::$user, Config::$password);
			self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		}

		return self::$connection;
	}
}
