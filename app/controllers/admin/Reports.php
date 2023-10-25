<?php
	class Reports extends Controller{

		public function __construct(){
			$this->reportModel = $this->model("Report");
            $this->customerModel = $this->model("Customer");
            $this->transactionModel = $this->model("Transaction");
            $this->productModel = $this->model("Product");
        }

        public function index(){
            $title = $this->reportModel->getPageTitle();
            $getPendingTransactions = $this->reportModel->getAllPendingTransaction();
            $getForPaymentTransactions = $this->reportModel->getAllForPaymentTransaction();
            $getForShippingTransactions = $this->reportModel->getAllForShippingTransaction();
            $getCompletedTransactions = $this->reportModel->getAllCompletedTransaction();
            $getTotalCustomers = $this->reportModel->getTotalCustomers();
            $getAllProductStocks = $this->reportModel->getAllProductStocks();
            $data = [
                "getPendingTransactions" => $getPendingTransactions,
                "getForPaymentTransactions" => $getForPaymentTransactions,
                "getForShippingTransactions" => $getForShippingTransactions,
                "getCompletedTransactions" => $getCompletedTransactions,
                "getTotalCustomers" => $getTotalCustomers,
                "getAllProductStocks" => $getAllProductStocks,
                "title" => $title
            ];
            $this->view("admin/report", $data);
        }
	}
?>