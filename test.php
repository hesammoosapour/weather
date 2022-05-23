<?php
$url="http://api.openweathermap.org/data/2.5/forecast/daily?q=new york,US&units=metric&cnt=7&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559";// گرفتن اب وهوا

//c0c4a4b4047b97ebc5948ac9c48c0559    api key from stackoverflow
$json=file_get_contents($url);
$data=json_decode($json,true);


echo "<pre>" ;
print_r($data );
echo "</pre>";

?>
<?php  // API اب و هوا
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

// Must point to composer's autoload file.
require 'vendor/autoload.php';

// Language of data (try your own language here!):
$lang = 'en';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'metric';

// Create OpenWeatherMap object.
// Don't use caching (take a look into Examples/Cache.php to see how it works).
$owm = new OpenWeatherMap('f0a69d67b4cd12a9930400b455732f20');
if (isset($_GET['send'])) {


    echo '<div class=" col-md-3" style="float: right">';
    try {
        $weather = $owm->getWeather($_GET['city'], $units, $lang); // گرفتن اب و هوا با دادن شهر
    } catch (OWMException $e) {
        echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
    } catch (\Exception $e) {
        echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
    }

}
$message = " 
    
<table style=\"width:100%; margin-top:100px \" >
 
  <tr>
    <td style='color: #005cbf'><img src='img/icons8-apartment-50.png'>شهر</td>
    <td style='color: #005cbf'><img src='img/demographics-of-a-population.png'>جمعیت</td>

    <td style='color: #6f42c1'><img src='img/thermometer.png'>دما</td>
    <td style='color: #491217'><img src='img/cloud.png'>ابر</td>
    <td style='color:#1c7430;'><img src='img/humidity.png'>رطوبت</td>
    <td style='color: #20c997'><img src='img/rain.png'>بارش</td>
    <td style='color: #fd7e14'><img src='img/pressure.png'>فشار</td>
  </tr>
  <tr>
    <td style='color: #005cbf'>".$_GET['city'] ."</td> 
    <td style='color: #005cbf'>". $data ['city']['population']."</td> 

    <td style='color: #6f42c1'>$weather->temperature</td>
    <td style='color: #491217'>$weather->clouds</td>
    <td style='color:#1c7430;'>$weather->humidity</td>
    <td style='color: #20c997'>$weather->precipitation</td>
    <td style='color: #fd7e14'>$weather->pressure</td>

  </tr>
 
</table>
";

