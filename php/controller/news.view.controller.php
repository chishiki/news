<?php

final class NewsMainViewController {

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

		$loc = $this->loc;

		if ($loc[2] == 'news') {

			$view = new NewsView();

			// /news/create/
			if ($loc[3] == 'create') { return $view->newsForm('create'); }

			// /news/update/<newsID>/
			if ($loc[3] == 'update' && is_numeric($loc[4])) { return $view->newsForm('update',$loc[4]); }

			// /news/confirm-delete/<newsID>/
			if ($loc[3] == 'confirm-delete' && is_numeric($loc[4])) { return $view->newsConfirmDelete($loc[4]); }

			// /news/
			return $view->newsList();

		}

	}

}

?>