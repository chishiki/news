<?php

final class NewsExportController {

	private $loc;
	private $input;
	private $modules;
	
	private $filename;
	private $columns;
	private $rows;

	public function __construct($loc, $input, $modules) {

		$this->loc = $loc;
		$this->input = $input;
		$this->modules = $modules;

		$this->filename = 'export';
		$this->columns = array();
		$this->rows = array();
		
		if ($loc[0] == 'csv' && $loc[1] == 'news') {

			$this->filename = 'news_' . date('Ymd-His');

			$news = new News();
			$cols = array_keys($news->describe());
			foreach ($cols AS $colName) { $this->columns = Lang::getLang($colName); }

			$arg = new NewsListParameter();
			$list = new NewsList($arg);
			$news = $list->news();

			foreach ($news AS $newsID) {
				$news = new News($newsID);
				$this->rows[] = $news;
			}

		}

	}

	public function filename() {

		return $this->filename;
		
	}
	
	public function columns() {

		return $this->columns;
		
	}
	
	public function rows() {

		return $this->rows;
		
	}

}

?>