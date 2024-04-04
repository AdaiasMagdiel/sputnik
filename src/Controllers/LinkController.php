<?php

namespace AdaiasMagdiel\Sputnik\Controllers;

use AdaiasMagdiel\Sputnik\Classes\Response;
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
		Response::send($this->template("index"));
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

		Response::send(
			$this->template("index", [
				"errors" => $errors,
				"result" => $result,
				"link" => $linkRaw
			])
		);
	}

	public function get(string $id)
	{
		$res = $this->repository->getLinkByIdentifier($id);

		if (!$res) {
			Response::send(
				"There's no link with this identifier in the database.",
				404
			);
			die();
		}

		$location = $res->link;
		Response::redirect($location);
	}
}
