<?php

namespace AdaiasMagdiel\Sputnik\Repositories;

use PDO;
use AdaiasMagdiel\Sputnik\Database\Connection;

class Repository
{
	protected PDO $conn;
	protected string $table;
	protected array $fields;

	public function __construct()
	{
		$this->conn = Connection::getConnection();
		$this->createTables();
	}

	protected function createTables()
	{
		$values = [];
		foreach ($this->fields as $key => $value) {
			$values[] = "{$key} {$value}";
		}
		$values = join(", ", $values);

		$sql = "CREATE TABLE IF NOT EXISTS {$this->table}({$values});";
		return $this->conn->exec($sql);
	}
}
