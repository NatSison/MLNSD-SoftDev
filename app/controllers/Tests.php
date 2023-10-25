<?php
	class Tests extends Controller{

		public function __construct(){
			$this->reportsModel = $this->model("Test");
            $this->customerModel = $this->model("Customer");
            $this->transactionModel = $this->model("Transaction");
            $this->productModel = $this->model("Product");
        }

        public function index(){
            $title = $this->reportsModel->getPageTitle();
            $getPendingTransactions = $this->reportsModel->getAllPendingTransaction();
            $getForPaymentTransactions = $this->reportsModel->getAllForPaymentTransaction();
            $getForShippingTransactions = $this->reportsModel->getAllForShippingTransaction();
            $getCompletedTransactions = $this->reportsModel->getAllCompletedTransaction();
            $getTotalCustomers = $this->reportsModel->getTotalCustomers();
            $getAllProductStocks = $this->reportsModel->getAllProductStocks();
            $data = [
                "getPendingTransactions" => $getPendingTransactions,
                "getForPaymentTransactions" => $getForPaymentTransactions,
                "getForShippingTransactions" => $getForShippingTransactions,
                "getCompletedTransactions" => $getCompletedTransactions,
                "getTotalCustomers" => $getTotalCustomers,
                "getAllProductStocks" => $getAllProductStocks,
                "title" => $title
            ];
            $this->view("test/index", $data);
        }
	}
?>