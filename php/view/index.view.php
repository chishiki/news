<?php 

final class NewsIndexView {

    private $urlArray;
	private $view;
	
	public function __construct($urlArray) {
		
	    $this->urlArray = $urlArray;
		$this->view = $this->index();

	}

	private function index() {

		$h = '';

		$hnw = new NewsView();
		$h .= $hnw->newsLinkList();

		return $h;
	    
	}
	
	public function getView() {
		
		return $this->view;
		
	}
	
}


?>