<?php 

require '../vendor/autoload.php';

use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class KavehSMS {

    private $api_key;

    function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    function sendSMS($receptor, $token, $token2, $token3, $template, $type) {
        $result = null;

        try{
            $api = new KavenegarApi($this->api_key);
            $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template);
            if($result){
                var_dump($result);
            }
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }

        return $result;
    }

}

//$receptor = "09133412374";
//$token = "547564";
//$token2 = "";
//$token3 = "";
//$template = "verify";
//$type = "";
//
