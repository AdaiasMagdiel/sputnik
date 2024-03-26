<?php

namespace AdaiasMagdiel\Sputnik\Controllers;

class LinkController extends Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->renderTemplate("index");
	}

	public function create() {
		$this->renderTemplate("index");
	}
}
