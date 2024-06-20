<?php 

	class Home extends Controllers{
		public function __construct() {
			parent::__construct();
		}

		public function home($params) {
			echo "Message from the controller";
		}

		public function data($params) {
			echo "Data received: ".$params;
		}

		public function cart($params) {
			$cart = $this->model->getCart($params);
			echo $cart;
		}
	}

 ?>