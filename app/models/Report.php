<?php
	class Report {
		private $db;
		
		public function __construct(){
			$this->db = new Database;
		}

        public function getPageTitle(){
            return "Reports";
        }

		public function getAllPendingTransaction(){
            $paymentStatus = "PENDING";
			$this->db->query("SELECT * FROM transactions WHERE status = :paymentStatus AND active = 1");

			// Bind Values
			$this->db->bind(":paymentStatus", $paymentStatus);
			//$allPendingTransactions = $this->db->single();
            
            //$allPendingTransactions = $this->db->query("SELECT COUNT(id) From transactions");
            //$testResult = "hello";
            $this->db->execute();
            //$allPendingTransactions = $allPendingTransactions->fetch(PDO::FETCH_ASSOC);

            //if ($this->db->execute()) {
            //    $row = $this->db->execute()->row(); // Assuming $result is an object that allows fetching a single row
            //    if ($row) {
            //        $fname = $row->fname;
            //        echo "First name: $fname";
            //    } else {
            //        echo "Customer not found";
            //    }
            //}
            $allPendingTransactions = $this->db->rowCount();
            return $allPendingTransactions;
		}
	
		public function getAllForPaymentTransaction(){
            $paymentStatus = "FOR PAYMENT";
			$this->db->query("SELECT * FROM transactions WHERE status = :paymentStatus AND active = 1");

			// Bind Values
			$this->db->bind(":paymentStatus", $paymentStatus);
            $this->db->execute();
            $allPendingTransactions = $this->db->rowCount();
            return $allPendingTransactions;
		}

		public function getAllForShippingTransaction(){
            $paymentStatus = "FOR SHIPPING";
			$this->db->query("SELECT * FROM transactions WHERE status = :paymentStatus AND active = 1");

			// Bind Values
			$this->db->bind(":paymentStatus", $paymentStatus);
            $this->db->execute();
            $allForShippingTransactions = $this->db->rowCount();
            return $allForShippingTransactions;
		}

		public function getAllCompletedTransaction(){
            $paymentStatus = "COMPLETED";
			$this->db->query("SELECT * FROM transactions WHERE status = :paymentStatus AND active = 1");

			// Bind Values
			$this->db->bind(":paymentStatus", $paymentStatus);
            $this->db->execute();
            $allCompletedTransactions = $this->db->rowCount();
            return $allCompletedTransactions;
		}

		public function getTotalCustomers(){
			$this->db->query("SELECT * FROM Customers");

			// Bind Values
            $this->db->execute();
            $allCompletedTransactions = $this->db->rowCount();
            return $allCompletedTransactions;
		}

		public function getAllProductStocks(){
			$this->db->query(
				"SELECT CONCAT(p.product_name,' ( ', pv.color ,' ) ') as prodNameColor, pv.id, pv.price, pv.stock
				FROM product_var pv
				LEFT JOIN products p ON p.id = pv.productId");
			
			
			$results = $this->db->resultSet();
			return $results;
		}

		public function getPayMongo(){

		}
	}
?>