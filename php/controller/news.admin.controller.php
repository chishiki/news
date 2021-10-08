<?php

final class NewsAdminController implements StateControllerInterface {

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

		if ($loc[0] == 'news' && $loc[1] == 'admin') {

			// /news/admin/create/

			if ($loc[2] == 'create' && isset($input['news-create'])) {

				$this->validateNewsURL($input['newsURL'], 'create');

				if (empty($this->errors)) {

					$news = new News();
					foreach ($input as $property => $value) {
						if (isset($news->$property)) {
							$news->$property = $value;
						}
					}
					News::insert($news, false, 'news_');
					$successURL = '/' . Lang::prefix() . 'news/admin/';
					header("Location: $successURL");

				}

			}

			// /news/admin/update/<newsID>/
			if ($loc[2] == 'update' && is_numeric($loc[3]) && isset($input['news-update'])) {

				$newsID = $loc[3];

				$this->validateNewsURL($input['newsURL'], 'update', $newsID);

				if (empty($this->errors)) {

					$news = new News($newsID);
					$news->updated = date('Y-m-d H:i:s');
					foreach ($input as $property => $value) {
						if (isset($news->$property)) {
							$news->$property = $value;
						}
					}
					$conditions = array('newsID' => $newsID);
					News::update($news, $conditions, true, false, 'news_');
					$this->messages[] = Lang::getLang('newsUpdateSuccessful');

				}

			}

			// /news/admin/delete/<newsID>/
			if ($loc[2] == 'delete' && is_numeric($loc[3]) && isset($input['news-delete'])) {

				$newsID = $loc[3];

				if ($input['newsID'] != $newsID) {
					$this->errors[] = array('news-delete' => Lang::getLang('thereWasAProblemDeletingYourNews'));
				}

				if (empty($this->errors)) {

					$news = new News($newsID);
					$news->markAsDeleted();
					$this->messages[] = Lang::getLang('newsDeleteSuccessful');

				}

			}

		}

	}

	private function validateNewsURL($newsURL, $type, $newsID = null) {
		
		if (empty($newsURL)) {
			$this->errors[] = array('newsURL' => Lang::getLang('newsUrlMustBeSet'));
		} else {
			if (NewsUtilities::newsUrlExists($newsURL)) {
				if ($type == 'update' && is_numeric($newsID)) {
					$news = new News($newsID);
					if ($news->newsURL != $newsURL) {
						$this->errors[] = array('newsURL' => Lang::getLang('newsUrlAlreadyUsedByAnotherNewsItem'));
					}
				} else {
					$this->errors[] = array('newsURL' => Lang::getLang('newsUrlAlreadyExists'));
				}
			}
			if (!preg_match('/^[A-Za-z0-9-]+$/D', $newsURL)) {
				$this->errors[] = array('newsURL' => Lang::getLang('onlyAlphanumericAndHyphenInputAreAllowedInTheUrlField'));
			}
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