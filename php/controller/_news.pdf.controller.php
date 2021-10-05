<?php

final class NewsPDF {

	private $doc;
	private $fileObject;
	private $fileObjectID;

	public function __construct($loc, $input) {

		$this->doc = 'NEWS';
		$this->fileObject = 'News';
		$this->fileObjectID = null;

	}

	public function doc() {

		return $this->doc;

	}

	public function getFileObject() {

		return $this->fileObject;

	}

	public function getFileObjectID() {

		return $this->fileObjectID;

	}

}

?>