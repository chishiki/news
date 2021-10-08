<?php

final class NewsAdminViewController implements ViewControllerInterface {

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

		if ($loc[0] == 'news' && $loc[1] == 'admin') {

			$view = new NewsView();

			// /news/admin/create/
			if ($loc[2] == 'create') { return $view->newsForm('create'); }

			// /news/admin/update/<newsID>/
			if ($loc[2] == 'update' && is_numeric($loc[3])) { return $view->newsForm('update',$loc[3]); }

			// /news/admin/confirm-delete/<newsID>/
			if ($loc[2] == 'confirm-delete' && is_numeric($loc[3])) { return $view->newsConfirmDelete($loc[3]); }

			// /news/admin/
			return $view->newsList();

		}

	}

}

?>