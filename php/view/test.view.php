<?php

final class NewsTestView {

	private $loc;
	private $input;
	private $modules;
	private $errors;
	private $messages;

	private $filename;
	private $columns;
	private $rows;

	public function __construct($loc = array(), $input = array(), $modules = array(), $errors = array(), $messages = array()) {

		$this->loc = $loc;
		$this->input = $input;
		$this->modules = $modules;
		$this->errors = $errors;
		$this->messages = $messages;

		$this->filename = null;
		$this->columns = array();
		$this->rows = array();

	}

	public function newsTestView() {

		$test = 'NEWS TEST';
		$card = new CardView('id',array('container-fluid'),'',array('col-12'),'TEST', $test,false);
		return $card->card();

	}

}

?>