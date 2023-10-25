<?php
	class Tests extends Controller{
		
		//public function index(){
		//	$data = [ //change accordingly
		//		"title" => "Hello Test Environment", 
		//	];
		//	
		//	$this->view("test/index", $data);
		//}

		public function __construct(){
			$this->testModel = $this->model("Test");
            $this->customerModel = $this->model("Customer");
            $this->transactionModel = $this->model("Transaction");
            $this->productModel = $this->model("Product");
        }

        public function index(){
            $title = $this->testModel->getTitle();
            $forPaymentTransactions = $this->transactionModel->getPendingTransactionForPayment();
            $data = [
                "forPaymentTransaction" => $forPaymentTransactions,
                "title" => $title
            ];
            $this->view("test/index", $data);
        }
	}
?>