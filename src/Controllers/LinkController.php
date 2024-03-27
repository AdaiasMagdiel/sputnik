<?php

namespace AdaiasMagdiel\Sputnik\Controllers;

class LinkController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->renderTemplate("index");
	}

	public function create()
	{
		$errors = [];
		$result = "";
		$linkRaw = "";

		$link = $_POST['link'] ?? "";
		if (!filter_var($link, FILTER_VALIDATE_URL)) {
			$errors = ["This value should be a valid URL."];
			$linkRaw = $link;
		}

		$result = $this->generateShortLink($link);

		$this->renderTemplate("index", [
			"errors" => $errors,
			"result" => $result,
			"link" => $linkRaw
		]);
	}

	public function generateShortLink(string $link)
	{
		$id = $this->generateIdentifier();
		return $id;
	}

	public function generateIdentifier(int $limit = 7)
	{
		$chars = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-_.';
		$rand_str = '';
		$max = mb_strlen($chars) - 1;

		for ($i = 0; $i < $limit; $i++) {
			$rand_index = random_int(0, $max);
			$char = $chars[$rand_index];

			while ($char === substr($rand_str, -1)) {
				$rand_index = random_int(0, $max);
				$char = $chars[$rand_index];
			}

			$rand_str .= $char;
		}

		return $rand_str;
	}
}
