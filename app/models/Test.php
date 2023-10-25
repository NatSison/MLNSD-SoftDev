<?php
    class Test {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
        public function getTitle(){
            $title = "Working";
            return $title;
        }
    }
?>