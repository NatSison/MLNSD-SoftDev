<?php
	class Transaction {
		private $db;
		
		public function __construct(){
			$this->db = new Database;
		}
		
		/***************** To Create New Transaction *****************/
		public function createTransaction(){
			if(!isset($_SESSION["user_info"]) OR !$_SESSION["login"]) {
				if(!isset($_SESSION["admin_info"]) OR !$_SESSION["admin_login"]){
					flash("message", "Please login in order to use that feature!", "alert alert-danger");
					redirectCurrent();
				}else{
					//$newTransaction = $this->db->query("INSERT INTO transactions (customerId, status, active, createdOn, createdBy) VALUE (:customerId, 'PENDING', '1', now(), 'System')");
				
					/****STATUS is only "PENDING", "FOR PAYMENT", "FOR SHIPPING", "COMPLETED", "CANCELLED" ************/
					/*** CREATE NEW TRANSACTION WHEN THERE IS NO ACTIVE TRANSACTION ***/
					
					// Bind Values
					//$this->db->bind(":customerId", $_SESSION["user_info"]->id);

					// Execute
					//if($newTransaction){
					//	return true;
					//} else {
					//	return false;
					//}
				}
			}else{
				$this->db->query("INSERT INTO transactions (customerId, status, active, createdOn, createdBy) VALUE (:customerId, 'PENDING', '1', now(), 'System')");
				
				/****STATUS is only "PENDING", "FOR PAYMENT", "FOR SHIPPING", "COMPLETED", "CANCELLED" ************/
				/*** CREATE NEW TRANSACTION WHEN THERE IS NO ACTIVE TRANSACTION ***/
				
				// Bind Values
				$this->db->bind(":customerId", $_SESSION["user_info"]->id);

				// Execute
				if($this-> db->execute()){
					return true;
				} else {
					return false;
				}
			}
		}
		
		/*************** To check if there is no active Transaction *************/
		public function transactionChecker(){
			if(!isset($_SESSION["user_info"]) OR !$_SESSION["login"]) {
				if(!isset($_SESSION["admin_info"]) OR !$_SESSION["admin_login"]){
					flash("message", "Please login in order to use that feature!", "alert alert-danger");
					redirectCurrent();
				}else{
					$row = $this->db->query("SELECT 1 FROM transactions WHERE customerId = :customerId AND active = 1");
			
					// Bind Values
					//$this->db->bind(":customerId", $_SESSION["user_info"]->id);

					
				}
				
			}else{
				$this->db->query("SELECT 1 FROM transactions WHERE customerId = :customerId AND active = 1");
			
				// Bind Values
				$this->db->bind(":customerId", $_SESSION["user_info"]->id);
				$row = $this->db->single();
			}
			

			
			return $row;
		}
		
		public function transactionPendingChecker(){
			$this->db->query("SELECT 1 FROM transactions WHERE customerId = :customerId AND active = 1 AND status IN ('FOR PAYMENT','FOR SHIPPING')");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$row = $this->db->single();
			return $row;
		}
		
		public function addToCart($data){
			$this->db->query("INSERT INTO order_products (productId, product_varId, transactionId, quantity, createdBy, createdOn) VALUE (:productId, :varId, :transactionId, :quantity, :createdBy, now())");
			
			// if createdBy is not specified
			if(!isset($data["createdBy"])){
				$data["createdBy"] = "System";
			}
			
			// Bind Values
			$this->db->bind(":productId", $data["productId"]);
			$this->db->bind(":varId", $data["varId"]);
			$this->db->bind(":transactionId", $data["transactionid"]);
			$this->db->bind(":quantity", $data["quantity"]);
			$this->db->bind(":createdBy", $data["createdBy"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		/**************************** GETTERS ************************/
		public function getTransaction($id){
			$this->db->query("SELECT * FROM transactions WHERE id = :id");
			
			// Bind Values
			$this->db->bind(":id", $id);
			
			$row = $this->db->single();
			return $row;
		}
		
		public function getTransactionPending(){
			$this->db->query("SELECT * FROM transactions WHERE customerId = :customerId AND active = 1 AND status = 'PENDING'");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$row = $this->db->single();
			return $row;
		}
		
		public function getPendingTransactionForPayment(){
			$this->db->query(
				"SELECT CONCAT(c.fname,' ',c.lname) as name, t.id as transactionId, t.customerId, t.status, t.amount, p.method, t.forProductInstallation, t.productInstallationStart
				FROM transactions t
				LEFT JOIN customers c ON c.id = t.customerId
				LEFT JOIN payments p ON p.transactionId = t.id
         		WHERE t.active = 1 AND t.status = 'FOR PAYMENT'");
			
			
			$results = $this->db->resultSet();
			return $results;
		}
		
		public function getPendingTransactionForShipping(){
			$this->db->query(
				"SELECT CONCAT(c.fname,' ',c.lname) as name, t.id as transactionId, t.customerId, t.status, d.method, d.shippingAddress, t.forProductInstallation, t.productInstallationStart
				FROM transactions t
				LEFT JOIN customers c ON c.id = t.customerId
				LEFT JOIN delivery d ON d.transactionId = t.id
         		WHERE t.active = 1 AND t.status = 'For Shipping'");
			
			
			$results = $this->db->resultSet();
			return $results;
		}
		
		public function getAllPricesPending(){
			$this->db->query(
				"SELECT SUM(var.price * op.quantity) as total
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'PENDING'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$row = $this->db->single()->total;
			return $row;
		}
		
		public function getAllPricesForPayment(){
			$this->db->query(
				"SELECT SUM(var.price) as total
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'FOR PAYMENT'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$row = $this->db->single()->total;
			return $row;
		}
		
		public function getActivePendingOrderProducts(){
			$this->db->query(
				"SELECT t.id as transactionId, p.id as productId, var.id as varId, op.id as orderId, t.status, p.product_name, p.category, p.details, op.quantity, var.stock, var.color, var.size, var.price, var.img
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
                    LEFT JOIN products p ON p.id = op.productId
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'PENDING'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}
		
		public function getActiveForPaymentOrderProducts(){
			$this->db->query(
				"SELECT t.id as transactionId, p.id as productId, op.id as orderId, t.status, p.product_name, op.quantity, var.id as varId, var.stock, var.color, var.size, var.price, var.img
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
                    LEFT JOIN products p ON p.id = op.productId
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'FOR PAYMENT'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}
		
		public function getActiveForPaymentOrderProductsById($id){
			$this->db->query(
				"SELECT t.id as transactionId, p.id as productId, op.id as orderId, t.status, p.product_name, op.quantity, var.id as varId, var.stock, var.color, var.size, var.price, var.img
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
                    LEFT JOIN products p ON p.id = op.productId
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'FOR PAYMENT'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $id);
			
			$results = $this->db->resultSet();
			return $results;
		}
		
		public function getActiveForShippingOrderProducts(){
			$this->db->query(
				"SELECT t.id as transactionId, p.id as productId, op.id as orderId, t.status, p.product_name, op.quantity, var.stock, var.color, var.size, var.price, var.img
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
                    LEFT JOIN products p ON p.id = op.productId
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'FOR SHIPPING'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}
		
		public function getCompletedOrderProducts(){
			$this->db->query(
				"SELECT CONCAT(c.fname,' ',c.lname) as name, t.id as transactionId, t.customerId, t.status, t.amount, d.method, d.shippingAddress, t.forProductInstallation, t.productInstallationStart, t.updatedOn, d.shippingFee
				FROM transactions t
				LEFT JOIN customers c ON c.id = t.customerId
				LEFT JOIN delivery d ON d.transactionId = t.id
         		WHERE t.active = 0 AND t.status = 'COMPLETED' AND t.customerId = :customerId");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}

		public function getAllCompletedOrderProducts(){
			$this->db->query(
				"SELECT CONCAT(c.fname,' ',c.lname) as name, t.id as transactionId, t.customerId, t.status, t.amount, d.method, d.shippingAddress, t.forProductInstallation, t.productInstallationStart, t.updatedOn, d.shippingFee
				FROM transactions t
				LEFT JOIN customers c ON c.id = t.customerId
				LEFT JOIN delivery d ON d.transactionId = t.id
         		WHERE t.active = 0 AND t.status = 'COMPLETED'");
			
			// Bind Values
			//$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}

		public function getActivePendingPaymentOrders(){
			$this->db->query(
				"SELECT t.id as transactionId, pro.id as productId, var.id as varId, op.id as orderId, t.status, t.amount, pro.product_name, pro.category, pro.details, op.quantity, var.stock, var.color, var.size, var.price, var.img, d.shippingFee, pay.method
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
                    LEFT JOIN products pro ON pro.id = op.productId
					LEFT JOIN delivery d ON d.transactionId = t.id 
					LEFT JOIN payments pay ON pay.transactionId = t.id 
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'FOR PAYMENT'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}

		
		public function getActiveForShippingOrdersById($id){
			$this->db->query(
				"SELECT t.id as transactionId, p.id as productId, var.id as varId, op.id as orderId, t.status, t.amount, p.product_name, p.category, p.details, op.quantity, var.stock, var.color, var.size, var.price, var.img, d.shippingFee
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
                    LEFT JOIN products p ON p.id = op.productId
					LEFT JOIN delivery d ON d.transactionId = t.id 
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'FOR SHIPPING'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $id);
			
			$results = $this->db->resultSet();
			return $results;
		}

		public function getActiveForShippingOrders(){
			$this->db->query(
				"SELECT t.id as transactionId, p.id as productId, var.id as varId, op.id as orderId, t.status, t.amount, p.product_name, p.category, p.details, op.quantity, var.stock, var.color, var.size, var.price, var.img, d.shippingFee
       				FROM order_products op
					LEFT JOIN transactions t ON t.id = op.transactionId
					LEFT JOIN product_var var ON op.product_varId = var.id
                    LEFT JOIN products p ON p.id = op.productId
					LEFT JOIN delivery d ON d.transactionId = t.id 
					WHERE t.customerId = :customerId AND t.active = 1 AND t.status = 'FOR SHIPPING'
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}

		public function getActiveTransactionId(){
			$this->db->query(
				"SELECT id as transactionId
       				FROM transactions t
					WHERE t.customerId = :customerId AND t.active = 1
				");
			
			// Bind Values
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
			
			$results = $this->db->resultSet();
			return $results;
		}
		
		/************* Remove ***************/
		public function removeOrderProduct($orderId){
			$this->db->query("DELETE FROM order_products WHERE id = :orderId");
			
			// Bind Values
			$this->db->bind(":orderId", $orderId);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function cancelTransaction($data){
			$this->db->query("UPDATE transactions SET active = 0, status = 'CANCELLED', updatedOn = now(), updatedBy = :updatedBy WHERE id = :transactionId");
			
			// if updatedBy is not specified
			if(!isset($data["updatedBy"])){
				$data["updatedBy"] = "System";
			}
			
			// Bind Values
			$this->db->bind(":updatedBy", $data["updatedBy"]);
			$this->db->bind(":transactionId", $data["id"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		/******** CHECKOUT *************/
		public function checkoutDelivery($data){
			$this->db->query("INSERT INTO delivery (transactionID, status, method, shippingAddress, createdDate, createdBy) VALUES (:transactionId, :status, :shippingMethod, :shippingAddress, now(), :createdBy)");
			
			// if createdBy is not specified
			if(!isset($data["createdBy"])){
				$data["createdBy"] = "System";
			}
			
			// Bind Values
			$this->db->bind(":transactionId", $data["transactionId"]);
			$this->db->bind(':status', 'PENDING');
			$this->db->bind(":shippingMethod", $data["shippingMethod"]);
			$this->db->bind(":shippingAddress", $data["shippingAddress"]);
			$this->db->bind(":createdBy", $data["createdBy"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function checkoutPayment($data){
			$this->db->query("INSERT INTO payments (transactionId, method, status, amount, paidDate, paidBy) VALUE (:transactionId, :paymentMethod, :status, :amount, now(), :paidBy)");
			
			// Bind Values
			$this->db->bind(":transactionId", $data["transactionId"]);
			$this->db->bind(":paymentMethod", $data["paymentMethod"]);
			$this->db->bind(":status", 'FOR PAYMENT');
			$this->db->bind(":paidBy", 'Customer');
			$this->db->bind(":amount", $data["amount"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function markTransactionToShipping($data){
			$this->db->query("UPDATE transactions SET status = 'FOR SHIPPING', updatedOn = now(), updatedBy = :updatedBy WHERE id = :transactionId");
			
			// if updatedBy is not specified
			if(!isset($data["updatedBy"])){
				$data["updatedBy"] = "System";
			}
			
			// Bind Values
			$this->db->bind(":updatedBy", $data["updatedBy"]);
			$this->db->bind(":transactionId", $data["transactionId"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function markTransactionAsComplete($data){
			$this->db->query("UPDATE transactions SET status = 'COMPLETED', active = 0, updatedOn = now(), updatedBy = :updatedBy WHERE id = :transactionId");
			
			// if updatedBy is not specified
			if(!isset($data["updatedBy"])){
				$data["updatedBy"] = "System";
			}
			
			// Bind Values
			$this->db->bind(":updatedBy", $data["updatedBy"]);
			$this->db->bind(":transactionId", $data["transactionId"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function checkoutTransactions($data){
			$this->db->query("UPDATE transactions SET status = 'FOR PAYMENT', amount = :amount, updatedOn = now(), updatedBy = :updatedBy, forProductInstallation = :productInstallation WHERE id = :transactionId");
			
			// if updatedBy is not specified
			if(!isset($data["updatedBy"])){
				$data["updatedBy"] = "System";
			}
			echo $data["productInstallation"];
			// Bind Values
			$this->db->bind(":amount", $data["amount"]);
			$this->db->bind(":updatedBy", $data["updatedBy"]);
			$this->db->bind(":transactionId", $data["transactionId"]);
			$this->db->bind(":productInstallation", $data["productInstallation"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
		
		public function checkoutVarStockUpdate($data){
			$this->db->query("UPDATE product_var SET stock = :newStock, updatedOn = now(), updatedBy = 'System' WHERE id = :id");
			
			// Bind
			$this->db->bind(":newStock", $data["newStock"]);
			$this->db->bind(":id", $data["id"]);
			
			// Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function getAllForPaymentTransaction(){
			$testResult = "hello";
			return $testResult;
		}

		public function updateInstallation($data){
			$this->db->query("UPDATE transactions SET productInstallationStart = :startDate, productInstallationEnd = :endDate, updatedOn = now(), updatedBy = 'System' WHERE id = :id");
			
			// Bind
			$this->db->bind(":startDate", $data["startDate"]);
			$this->db->bind(":endDate", $data["endDate"]);
			$this->db->bind(":id", $data["id"]);
			
			// Execute
			if($this->db->execute()){
				$this->db->query("UPDATE delivery SET shippingDate = :startDate WHERE transactionID = :id");
				$this->db->bind(":startDate", $data["startDate"]);
				$this->db->bind(":id", $data["id"]);
				if($this->db->execute()){
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function updateTransactionPaymongo($transactionId, $paymongoID) {
			$this->db->query("UPDATE transactions SET paymongoID = :paymongoID WHERE id = :transactionId");
			$this->db->bind(":transactionId", $transactionId);
			$this->db->bind(":paymongoID", $paymongoID);
		
			if ($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}
	
		public function getPayMongoPaymentStatus(){
			
		}

		public function checkTransactionPayMongo() {
			$this->db->query("SELECT paymongoID FROM transactions WHERE customerId = :customerId AND active = 1");
			$this->db->bind(":customerId", $_SESSION["user_info"]->id);
		
			if ($this->db->execute()) {
				$result = $this->db->single(); // Assuming a method like 'single' to fetch a single row
		
				if ($result->paymongoID != null) {
					return true;
				} else {
					// Handle the case where the query executed successfully but no row was found
					return false;
				}
			} else {
				// Handle the case where the query failed to execute
				return false;
			}
		}
	}
?>