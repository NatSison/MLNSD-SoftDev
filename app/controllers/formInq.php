<?php
	class formInq extends Controller {
		public function __construct() {
			$this->customerModel = $this->model("Customer");
			$this->transactionModel = $this->model("Transaction");
		}
		
		public function index(){
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				// Sanitize POST Array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				$data = [
					"fname" => trim($_POST["fname"]),
					"lname" => trim($_POST["lname"]),
					"contactNumber" => trim(preg_replace("/\D+/", "",$_POST["contactNumber"])),
					"email" => trim($_POST["email"]),
					"inquiryStatement" => trim($_POST["inquiryStatement"]),
				];
				if ($this->customerModel->addInquiry($data)) {
					flash("message", "Updated Installation Schedule");
					var_dump($data);
					redirect("");
				} else {
                    var_dump($data);
					die("Something went wrong");
				}
			}else{
				$this->view("customers/form");
			}
		}
	}
?>