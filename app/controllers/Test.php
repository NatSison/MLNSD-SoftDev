<?php
	class Test extends Controller{
		
		public function index(){
			$data = [ //change accordingly
				"title" => "Hello World", 
			];
			
			$this->view("test/index.php", $data);
			
		}
	}
?>