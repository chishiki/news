<?php

final class NewsMainViewController implements ViewControllerInterface {

	private $loc;
	private $input;
	private $modules;
	private $errors;
	private $messages;

	public function __construct($loc, $input, $modules, $errors, $messages) {

		$this->loc = $loc;
		$this->input = $input;
		$this->modules = $modules;
		$this->errors = $errors;
		$this->messages =  $messages;

	}

	public function getView() {

		if ($this->loc[0] == 'news' && !empty($this->loc[1])) {

			$newsID = NewsUtilities::getNewsWithURL($this->loc[1]);
			if (!is_null($newsID)) {
				$view = new NewsView();
				return $view->newsView($newsID);
			}

		}

	}

}

?>