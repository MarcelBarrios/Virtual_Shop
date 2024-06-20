<?php 

	class homeModel {

		public function __construct() {

			echo "Message from the model Home";
		}

		public function getCart($params) {
			return "Data from cart # ".$params;
		}
	}
?>