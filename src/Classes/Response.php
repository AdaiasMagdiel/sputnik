<?php

namespace AdaiasMagdiel\Sputnik\Classes;


class Response
{
	public static function send(string $body, int $status_code = 200, array $headers = [])
	{
		http_response_code($status_code);

		foreach ($headers as $header => $value) {
			header("{$header}: {$value}");
		}

		echo $body;
	}

	public static function redirect(string $location, bool $permantent = False)
	{
		$status_code = $permantent ? 301 : 302;
		$message = "You are being redirected to the following URL: {$location}";

		self::send($message, $status_code, ["Location" => $location]);
	}
}
