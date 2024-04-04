<?php

namespace AdaiasMagdiel\Sputnik\Controllers;

use League\Plates\Engine;

class Controller
{
	protected $templates;

	protected function __construct()
	{
		$this->templates = new Engine(dirname(__DIR__, 1) . '/templates');
	}

	protected function renderTemplate(string $template, array $data = [])
	{
		echo $this->templates->render($template, $data);
	}

	protected function template(string $template, array $data = [])
	{
		return $this->templates->render($template, $data);
	}
}
