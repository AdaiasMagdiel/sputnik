<?php

namespace AdaiasMagdiel\Sputnik\Controllers;

use AdaiasMagdiel\Sputnik\Services\LinkService;
use AdaiasMagdiel\Sputnik\Repositories\LinkRepository;

class LinkController extends Controller
{
	protected LinkService $service;
	protected LinkRepository $repository;

	public function __construct()
	{
		$this->service = new LinkService();
		$this->repository = new LinkRepository();
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
		if (substr($link, 0, 4) !== 'http') {
			$link = 'https://' . $link;
		}

		if (!filter_var($link, FILTER_VALIDATE_URL)) {
			$errors = ["This value should be a valid URL."];
			$linkRaw = $link;
		}

		$result = $this->service->generateShortLink($link);

		$this->renderTemplate("index", [
			"errors" => $errors,
			"result" => $result,
			"link" => $linkRaw
		]);
	}

	public function get(string $id)
	{
		$res = $this->repository->getLinkByIdentifier($id);

		if (!$res) {
			http_response_code(404);
			echo "There's no link with this identifier in the database.";
			die();
		}

		$location = $res->link;
		header("Location: {$location}", true, 302);
		echo "You are being redirected to the following URL: {$location}.";
	}
}
