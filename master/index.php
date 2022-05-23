<?php
//Includes the class ApiCall
include('classes/ApiCall.php');

//Make a new instanc of the ApiCall class
$api = new ApiCall("f0a69d67b4cd12a9930400b455732f20");

//Making the call with london as city metric as units and a 5 day forecast
$api->makeCall("kerman","metric","forecast");
