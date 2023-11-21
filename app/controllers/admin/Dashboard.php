<?php
	class Dashboard extends Controller {
		public function __construct(){
			if(!isset($_SESSION["admin_info"]) OR !$_SESSION["admin_login"]) {
				flash("message", "Please login in order to use that feature!", "alert alert-danger");
				redirectCurrent();
			} else {
				$this->customerModel = $this->model("Customer");
				$this->productModel = $this->model("Product");
				$this->transactionModel = $this->model("Transaction");
				$this->reportModel = $this->model("Report");
				
				if(!$this->transactionModel->transactionChecker()){
					$this->transactionModel->createTransaction();
				}
			}
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
			// $forPaymentTransactions = $this->transactionModel->getPendingTransactionForPayment();
			// $forShippingTransactions = $this->transactionModel->getPendingTransactionForShipping();
			// $completedTransactions = $this->transactionModel->getAllCompletedOrderProducts();
			
			// $data = [
			// 	"forPaymentTransactions" => $forPaymentTransactions,
			// 	"forShippingTransactions" => $forShippingTransactions,
			// 	"completedOrders" => $completedTransactions,
			// 	"orders" => []
			// ];
			// $this->view("admin/report", $data);
		}

		public function orders(){
			$forPaymentTransactions = $this->transactionModel->getPendingTransactionForPayment();
			$forShippingTransactions = $this->transactionModel->getPendingTransactionForShipping();
			$completedTransactions = $this->transactionModel->getAllCompletedOrderProducts();
			
			$data = [
				"forPaymentTransactions" => $forPaymentTransactions,
				"forShippingTransactions" => $forShippingTransactions,
				"completedOrders" => $completedTransactions,
				"orders" => []
			];
			$this->view("admin/dashboard(old)", $data);
		}

		public function show($id){
			$pendingPaymentList = $this->transactionModel->getActivePendingPaymentOrdersByID($id);
			$pendingForShippingList = $this->transactionModel->getActiveForShippingOrdersByID($id);
			$customerCompletedOrderList = $this->transactionModel->getCompletedOrderProductsByID($id);
			$customerActiveTransactionId = $this->transactionModel->getActiveTransactionIdByID($id);
			$totalPrice = $this->transactionModel->getAllPricesPending();

			
				$data = [
					"pendingPaymentList" => $pendingPaymentList,
					"pendingForShippingList" => $pendingForShippingList,
					"completedOrderList" => $customerCompletedOrderList,
					"user_info" => $_SESSION["user_info"],
					"totalPrice" => $totalPrice,
					"rowCounter" => 1,
					"transactionId" => (!empty($customerActiveTransactionId) && isset($customerActiveTransactionId[0]->transactionId)) ? $customerActiveTransactionId[0]->transactionId : null,
				];
			
			$this->view("customers/profile", $data);
		}
		
		
		public function markAsPaid($id){
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$data = [
					"updatedBy" => $_SESSION["admin_info"]->fname,
					"transactionId" => $id
				];
				
				if($this->transactionModel->markTransactionToShipping($data)){
					flash("message", "The Order has been marked as For Shipping!");
					redirectCurrent();
				} else {
					die("Something went wrong!");
				}
			}
		}
		


		public function completeOrder($id){
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$data = [
					"updatedBy" => $_SESSION["admin_info"]->fname,
					"transactionId" => $id
				];
				
				if($this->transactionModel->markTransactionAsComplete($data)){
					flash("message", "The Order has been marked as Complete!");
					redirectCurrent();
				} else {
					die("Something went wrong!");
				}
			}
		}
	}
?>