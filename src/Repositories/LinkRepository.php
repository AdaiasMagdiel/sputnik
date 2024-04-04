<?php

namespace AdaiasMagdiel\Sputnik\Repositories;

class LinkRepository extends Repository
{
	protected string $table = "links";
	protected array $fields = [
		"id" => "INTEGER PRIMARY KEY AUTOINCREMENT",
		"link" => "VARCHAR(255) NOT NULL",
		"identifier" => "VARCHAR(25) NOT NULL UNIQUE"
	];

	public function __construct()
	{
		parent::__construct();
	}

	public function saveShortLink(string $link, string $identifier)
	{
		$sql = "INSERT INTO links(link, identifier) VALUES(:link, :identifier);";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute(["link" => $link, "identifier" => $identifier]);
		return $identifier;
	}

	public function getLinkByIdentifier(string $identifier)
	{
		$sql = "SELECT link FROM links WHERE identifier = :identifier;";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute(["identifier" => $identifier]);
		return $stmt->fetch();
	}

	public function getIdentifierByLink(string $link)
	{
		$sql = "SELECT identifier FROM links WHERE link = :link;";
		$stmt = $this->conn->prepare($sql);

		$stmt->execute(["link" => $link]);
		return $stmt->fetch();
	}
}
