<?php

if(!class_exists("ApiCall")){

	class ApiCall{

		private $key;

		public function __construct($key){
			$this->key = $key;
		}

		public function makeCall($city,$units,$url){

			$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/$url?q=$city&APPID=$this->key&units=$units");
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_POST, false);
	        $result = json_decode(curl_exec($ch), true);
	        var_dump($result);

		}

	}
}