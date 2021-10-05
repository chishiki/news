<?php

final class NewsAPI {
		
	    private $loc;
	    private $input;
	    
	    public function __construct($loc, $input) {
			
	        $this->loc = $loc;
	        $this->input = $input;
			
		}
		
		public function response() {

	    	if ($this->loc[0] == 'api' && $this->loc[1] == 'news') {

				$response = '{"api":"news"}';
				return $response;

			}

		}
		
	}

?>