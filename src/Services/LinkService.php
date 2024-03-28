<?php

namespace AdaiasMagdiel\Sputnik\Services;

use AdaiasMagdiel\Sputnik\Repositories\LinkRepository;

class LinkService
{
	protected LinkRepository $repository;

	public function __construct()
	{
		$this->repository = new LinkRepository();
	}

	public function generateShortLink(string $link)
	{
		$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
		$host = $_SERVER['HTTP_HOST'];

		$id = $this->generateIdentifier();
		$id = $this->repository->saveShortLink($link, $id);

		return "{$protocol}://{$host}/{$id}";
	}

	protected function generateIdentifier(int $limit = 7)
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
