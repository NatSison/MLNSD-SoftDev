<?php
	class Transactions extends Controller{
		public function __construct() {
			if(!isset($_SESSION["user_info"]) OR !$_SESSION["login"]) {
				if(!isset($_SESSION["admin_info"]) OR !$_SESSION["admin_login"]){
					flash("message", "Please login in order to use that feature!", "alert alert-danger");
					redirectCurrent();
				}else{
					$this->customerModel = $this->model("Customer");
					$this->productModel = $this->model("Product");
					$this->transactionModel = $this->model("Transaction");
					
					if(!$this->transactionModel->transactionChecker()){
						$this->transactionModel->createTransaction();
					}
				}
			}else{
				$this->customerModel = $this->model("Customer");
				$this->productModel = $this->model("Product");
				$this->transactionModel = $this->model("Transaction");
				
				if(!$this->transactionModel->transactionChecker()){
					$this->transactionModel->createTransaction();
				}
			}
		}
		
		public function index(){
			$shoppingCart = $this->transactionModel->getActivePendingOrderProducts();
			$totalPrice = $this->transactionModel->getAllPricesPending();
			$data = [
				"shoppingCart" => $shoppingCart,
				"totalPrice" => $totalPrice
			];
			
			$this->view("transactions/index", $data);
			
		}
		
		public function addToCart(){
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				if($this->transactionModel->transactionPendingChecker()){
					flash("message", "You have an active order. Please wait for the active order to be marked as Completed before doing another order.", "alert alert-danger");
					redirectCurrent();
				}
				
				// Sanitize POST Array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				if(isset($_POST["varId"])){
					// Validation of stocks
					$varProduct = $this->productModel->getVarProductById($_POST["varId"]);
					$transaction = $this->transactionModel->getTransactionPending();
					if($_POST["quantity"] > $varProduct->stock){
						flash("message","Quantity cannot be greater than stocks! Please select within the available stocks", "alert alert-danger");
						redirectCurrent();
					} else {
						$data = [
							"createdBy" => "Customer",
							"productId" => $varProduct->productId,
							"varId" => $varProduct->id,
							"transactionid" => $transaction->id,
							"quantity" => $_POST["quantity"]
						];
						
						// add to cart
						if($this->transactionModel->addToCart($data)){
							flash("message", "The product has been added to cart!");
							redirectCurrent();
						} else {
							die("Something went wrong!");
						}
					}
				} else {
					flash("message","Please select a variety before clicking 'Add To Cart'", "alert alert-danger");
					redirectCurrent();
				}
			} else {
				flash("message", "There seems to be an issue! Please reach out to support!", "alert alert-danger");
				redirectCurrent();
			}
		}
		
		public function checkout(){
			$shoppingCart = $this->transactionModel->getActivePendingOrderProducts();
			$transaction = $this->transactionModel->getTransactionPending();
			$totalPrice = $this->transactionModel->getAllPricesPending();
			
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				// Sanitize POST Array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				$data = [
					//default
					"totalPrice" => $totalPrice,
					"shoppingCart" => $shoppingCart,
					"custId" => $_SESSION["user_info"]->id,
					
					"error" => [],
					"createdBy" => "Customer",
					"updatedBy" => "Customer",
					"shippingAddress" => $_POST["shippingAddress"],
					"shippingMethod" => $_POST["shippingMethod"],
					"paymentMethod" => $_POST["paymentMethod"],
					"amount" => $totalPrice,
					"transactionId" => $transaction->id,
					"productInstallation" => $_POST["productInstallation"]
				];
				
				//validation
				if (empty($data["shippingAddress"])) {
					$data["error"]["shippingAddress_err"] = "Please enter shipping address!";
				}
				
				// for stocks checking
				foreach ($shoppingCart as $order){
					if($order->quantity > $order->stock){
						flash("message", "Order cannot proceed as a product is short on stock", "alert alert-danger");
						redirectCurrent();
					}
				}
				
				// Make sure there are no errors
				if(empty($data["error"])){
					// proceed with checkout
					if($this->transactionModel->checkoutDelivery($data) && $this->transactionModel->checkoutPayment($data) && $this->transactionModel->checkoutTransactions($data)){
						// update stocks
						foreach ($shoppingCart as $order){
							$newStock = $order->stock - $order->quantity;

							$stockData = [
								"id" => $order->varId,
								"newStock" => $newStock
							];
							$this->transactionModel->checkoutVarStockUpdate($stockData);
						}
						flash("message", "Thank you! Your order is now submitted!");
						redirect("customers/profile");
					} else {
						die("Something went wrong");
					}
				} else {
					//Load view with errors
					$this->view("transactions/checkout", $data);
				}
				
			} else {
				$data = [
					"totalPrice" => $totalPrice,
					"shoppingCart" => $shoppingCart,
					"transactionId" => $transaction->id,
					"custId" => $_SESSION["user_info"]->id,
					"shippingAddress" => $_SESSION["user_info"]->streetAddress." ".$_SESSION["user_info"]->city." ".$_SESSION["user_info"]->province." ".$_SESSION["user_info"]->postalCode
				];
				$this->view("transactions/checkout", $data);
			}
		}
		
		public function updateQuanity(){
			$shoppingCart = $this->transactionModel->getActivePendingOrderProducts();
			$transaction = $this->transactionModel->getTransactionPending();
			$totalPrice = $this->transactionModel->getAllPricesPending();
			
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				// Sanitize POST Array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				$data = [
					//default
					"totalPrice" => $totalPrice,
					"shoppingCart" => $shoppingCart,
					"custId" => $_SESSION["user_info"]->id,
					
					"error" => [],
					"createdBy" => "Customer",
					"updatedBy" => "Customer",
					"shippingAddress" => $_POST["shippingAddress"],
					"shippingMethod" => $_POST["shippingMethod"],
					"paymentMethod" => $_POST["paymentMethod"],
					"amount" => $totalPrice,
					"transactionId" => $transaction->id,
					"productInstallation" => $_POST["productInstallation"]
				];
				
				//validation
				if (empty($data["shippingAddress"])) {
					$data["error"]["shippingAddress_err"] = "Please enter shipping address!";
				}
				
				// for stocks checking
				foreach ($shoppingCart as $order){
					if($order->quantity > $order->stock){
						flash("message", "Order cannot proceed as a product is short on stock", "alert alert-danger");
						redirectCurrent();
					}
				}
				
				// Make sure there are no errors
				if(empty($data["error"])){
					// proceed with checkout
					if($this->transactionModel->checkoutDelivery($data) && $this->transactionModel->checkoutPayment($data) && $this->transactionModel->checkoutTransactions($data)){
						// update stocks
						foreach ($shoppingCart as $order){
							$newStock = $order->stock - $order->quantity;

							$stockData = [
								"id" => $order->varId,
								"newStock" => $newStock
							];
							$this->transactionModel->checkoutVarStockUpdate($stockData);
						}
						flash("message", "Thank you! Your order is now submitted!");
						redirect("customers/profile");
					} else {
						die("Something went wrong");
					}
				} else {
					//Load view with errors
					$this->view("transactions/checkout", $data);
				}
			}
		}
			

		public function removeFromCart($orderId){
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				// Sanitize POST Array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				if($this->transactionModel->removeOrderProduct($orderId)){
					flash("message", "Product has been removed from shopping cart!");
					redirectCurrent();
				} else {
					die("Something went wrong!");
				}
			} else {
				flash("message", "There seems to be an issue removing the product! Please reach out to support!", "alert alert-danger");
				redirect("transactions/index");
			}
		}
		
		public function cancelOrder($id){
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$forPaymentOrders = $this->transactionModel->getActiveForPaymentOrderProducts();
				
				// Sanitize POST Array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				$data = [
					"updatedBy" => "Customer",
					"id" => $id
				];
				
				if($this->transactionModel->cancelTransaction($data)){
					foreach ($forPaymentOrders as $order){
						$newStock = $order->stock + $order->quantity;
						$stockData = [
							"id" => $order->varId,
							"newStock" => $newStock
						];
						$this->transactionModel->checkoutVarStockUpdate($stockData);
					}
					
					flash("message", "Order has been cancelled!");
					redirectCurrent();
				} else {
					die("Something went wrong!");
				}
			} else {
				flash("message", "There seems to be an issue removing the product! Please reach out to support!", "alert alert-danger");
				redirect("transactions/index");
			}
		}

		private function isPayMongoIDPaid() {
			// Set up Guzzle client
			$client = new \GuzzleHttp\Client();
			
			// if($this->transactionModel->){

			// }

			try {
				// Make a GET request to the PayMongo API to get the checkout session details
				$response = $client->request('GET', 'https://api.paymongo.com/v1/checkout_sessions/' . $paymongoID, [
					'headers' => [
						'accept' => 'application/json',
						'authorization' => 'Basic c2tfdGVzdF9Ec2c2Mnd5MUpYcHVYUGRMUmJIOThMSmg6',
					],
					'verify' => false, // Disable SSL verification (use cautiously)
				]);
		
				// Parse the response
				$responseData = json_decode($response->getBody(), true);
		
				// Check if the payment status is "paid"
				if (isset($responseData['data']['attributes']['payment']['status']) && $responseData['data']['attributes']['payment']['status'] === 'paid') {
					return true;
				} else {
					return false;
				}
			} catch (\GuzzleHttp\Exception\RequestException $e) {
				// Handle exceptions here, log, or display an appropriate error message
				echo 'Error: ' . $e->getMessage();
				return false;
			}
		}
		

		public function payMongo() {
			require_once('..\vendor\autoload.php');
		
			$paymongoID = $this->transactionModel->checkTransactionPayMongo();

			if (!$paymongoID || !$this->isPayMongoIDPaid($paymongoID)) {
				// PayMongo ID does not exist or is not paid, proceed with your logic
				$client = new \GuzzleHttp\Client();
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					}try {
						$customerName = $_POST["customerName"];
						$contactNumber = $_POST["contactNumber"];
						$email = $_POST["email"];
						
						$transactionId = $_POST["transactionId"];
						$price = $_POST["price"];
						$price = (string)$price;
						$price = str_replace('.', '', $price);
						$price = (int)$price;
						$color = $_POST["color"];
						$product_name = $_POST["product_name"];
						$quantity = $_POST["quantity"];
						$paymentMethod = $_POST["paymentMethod"];
						$quantity = (int)$quantity;
						$response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
							'json' => [
								'data' => [
									'attributes' => [
										'billing' => [
											'name' => $customerName,
											'email' => $email,
											'phone' => $contactNumber,
										],
										'send_email_receipt' => false,
										'show_description' => false,
										'show_line_items' => true,
										'description' => 'description',
										'line_items' => [
											[
												'currency' => 'PHP',
												'amount' => $price,
												'description' => $color,
												'name' => $product_name,
												'quantity' => $quantity,
											],
										],
										'payment_method_types' => [$paymentMethod],
									],
								],
							],
							'headers' => [
								'Content-Type' => 'application/json',
								'accept' => 'application/json',
								'authorization' => 'Basic c2tfdGVzdF9Ec2c2Mnd5MUpYcHVYUGRMUmJIOThMSmg6',
							],
							'verify' => false,
						]);
						$responseData = json_decode($response->getBody(), true);
						if (isset($responseData['data']['attributes']['checkout_url'])) {
							$checkoutUrl = $responseData['data']['attributes']['checkout_url'];
						
							// Check if PayMongo ID is present in the response
							if (isset($responseData['data']['id'])) {
								$paymongoID = $responseData['data']['id'];
								if($this->transactionModel->updateTransactionPayMongo($transactionId , $paymongoID)) {

								}
								header('Location:' . $checkoutUrl);
								exit();
							} else {
								echo 'PayMongo ID not found in the response.';
							}
						} else {
							echo 'Checkout URL not found in the response.';
						}
					} catch (\GuzzleHttp\Exception\RequestException $e) {
						// Handle exceptions here, log, or display an appropriate error message
						echo 'Error: ' . $e->getMessage();
					}
					// }else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					// 	try {
					// 		$response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
					// 			'json' => [
					// 				'data' => [
					// 					'attributes' => [
					// 						'billing' => [
					// 							'name' => $customerName,
					// 							'email' => $email,
					// 							'phone' => $contactNumber,
					// 						],
					// 						'send_email_receipt' => false,
					// 						'show_description' => false,
					// 						'show_line_items' => true,
					// 						'description' => 'description',
					// 						'line_items' => [
					// 							[
					// 								'currency' => 'PHP',
					// 								'amount' => $price,
					// 								'description' => $color,
					// 								'name' => $product_name,
					// 								'quantity' => $quantity,
					// 							],
					// 						],
					// 						'payment_method_types' => ['paymaya'],
					// 					],
					// 				],
					// 			],
					// 			'headers' => [
					// 				'Content-Type' => 'application/json',
					// 				'accept' => 'application/json',
					// 				'authorization' => 'Basic c2tfdGVzdF9Ec2c2Mnd5MUpYcHVYUGRMUmJIOThMSmg6',
					// 			],
					// 			'verify' => false,
					// 		]);
				
					// 		$responseData = json_decode($response->getBody(), true);
				
					// 		if (isset($responseData['data']['attributes']['checkout_url'])) {
					// 			$checkoutUrl = $responseData['data']['attributes']['checkout_url'];
				
					// 			// Check if PayMongo ID is present in the response
					// 			if (isset($responseData['data']['id'])) {
					// 				$paymongoID = $responseData['data']['id'];
				
					// 				// Assuming you have a valid $transactionId and $paymongoID
					// 				if ($this->transactionModel->updateTransactionPayMongo($transactionId, $paymongoID)) {
					// 					header('Location:' . $checkoutUrl);
					// 					exit(); // Ensure that no further code is executed after the redirect
					// 				} else {
					// 					echo 'Failed to update PayMongoID in the database.';
					// 				}
					// 			} else {
					// 				echo 'PayMongo ID not found in the response.';
					// 			}
					// 		} else {
					// 			echo 'Checkout URL not found in the response.';
					// 		}
					// 	} catch (\GuzzleHttp\Exception\RequestException $e) {
					// 		// Handle exceptions here, log, or display an appropriate error message
					// 		echo 'Error: ' . $e->getMessage();
					// 	}
					// }

					var_dump($paymentMethod);
				}
	}
		

		public function getPaymentStatus($checkoutSessionId) {
			require_once('vendor/autoload.php');
		
			$client = new \GuzzleHttp\Client();
		
			try {
				$response = $client->request('GET', 'https://api.paymongo.com/v1/checkout_sessions/' . $checkoutSessionId, [
					'headers' => [
						'accept' => 'application/json',
						'authorization' => 'Basic c2tfdGVzdF9Ec2c2Mnd5MUpYcHVYUGRMUmJIOThMSmg6',
					],
				]);
		
				$responseData = json_decode($response->getBody(), true);
		
				// Check if the payment is successful
				if (isset($responseData['data']['attributes']['payment']['status']) && $responseData['data']['attributes']['payment']['status'] === 'paid') {
					echo 'Payment Successful!';
				} else {
					echo 'Payment Pending or Failed.';
				}
			} catch (\GuzzleHttp\Exception\RequestException $e) {
				// Handle exceptions here, log or display an appropriate error message
				echo 'Error: ' . $e->getMessage();
			}
		}
		

		public function updateDelivery(){
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				// Sanitize POST Array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				$customerId = $_GET["cust"];
				$transId = $_GET["transId"];
				$newStartDate = strtotime(substr($_POST["daterange"], 0, 10));
				$newStartDate = date("Y-m-d H:i:s", $newStartDate);
				$newEndDate = strtotime(substr($_POST["daterange"], 12, 11));
				$newEndDate = date("Y-m-d H:i:s", $newEndDate);
				$data = [
					"id" => trim($_GET['transId']),
            	    "daterange" => trim($_POST["daterange"]),
            	    "startDate" => $newStartDate,
            	    "endDate" => $newEndDate,
            	    "testData" => "Working",
					//"transId" => trim($_Get['transId'])
            	];

				if ($this->transactionModel->updateInstallation($data)) {
					flash("message", "Updated Installation Schedule");
					redirect("admin/login");
				} else {
					die("Something went wrong");
				}

            	$this->view("admin/login",$data);
			}else{
				$currentURL = $_SERVER['REQUEST_URI'];
				$currentURL = rtrim($currentURL, '?');
				$segments = explode('/', trim($currentURL, '/'));
				$code = end($segments);
				if (preg_match('/cust(\d+)/', $code, $matches)) {
					$customerId = $matches[1];
				}
				if (preg_match('/(\d+)cust/', $code, $matches)) {
					$transId = $matches[1];
				}
				$customer = $this->customerModel->getCustomerById($customerId);
				$transaction = $this->transactionModel->getTransaction($transId);
				$data = [
                    "customer" => $customer,
					"transaction" => $transaction,
					"transId" => $transId,
					"custId" => $customerId,
				];
				$this->view("transactions/updateDelivery",$data);
			}
		}
	}
?>