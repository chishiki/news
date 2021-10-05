<?php

final class NewsController implements StateControllerInterface {

	private $loc;
	private $input;
	private $modules;
	private $errors;
	private $messages;

	public function __construct($loc, $input, $modules) {

		$this->loc = $loc;
		$this->input = $input;
		$this->modules = $modules;
		$this->errors = array();
		$this->messages =  array();

	}

	public function setState() {

		$loc = $this->loc;
		$input = $this->input;
		$modules = $this->modules;

		if ($this->loc[0] == 'news') {

			$controller = new NewsMainController($loc,$input,$modules);

		}

		if (isset($controller)) {
			$controller->setState();
			$this->errors = $controller->getErrors();
			$this->messages = $controller->getMessages();
		}

	}

	public function getErrors() {
		return $this->errors;
	}

	public function getMessages() {
		return $this->messages;
	}

}

?>