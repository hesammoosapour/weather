<!-- f0a69d67b4cd12a9930400b455732f20--   my own api>
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


    $city = $_GET['city']; //گرفتن شهر
    $country =  $_GET['countries'] ; // گرفتن کشور

    $url="http://api.openweathermap.org/data/2.5/forecast/daily?q=".$city.",".$country."&units=metric&cnt=7&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559";// گرفتن اب وهوا
//    $url="http://api.openweathermap.org/data/2.5/forecast/daily?q=kerman,IR&units=metric&cnt=7&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559";// گرفتن اب وهوا

    //c0c4a4b4047b97ebc5948ac9c48c0559    api key from stackoverflow
    $json = file_get_contents($url);
    $data = json_decode($json,true);
//print_r($data);
foreach($data as $day => $value) :
//  echo "Max temperature for day " . $day . " will be " . $value[temp][max] . "<br />" ;
//  print_r($value);


//        echo $population = "<p style='margin-top: '>"."جمعیت شهر : ".$value['city']['population']."</p>";
    endforeach;


echo "<pre>" ;
print_r($data );


//echo "دمای روز" .$data ['list']['0']['temp']['day'];
echo "</pre>";


    include 'include/today.php';
    include 'include/tomorrow.php';
    include 'include/in2days.php';
    include 'include/in3days.php';
    include 'include/in4days.php';
    include 'include/in5days.php';

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

    echo '</div>';
    /* دخیره اطلاعات کاربر در متغیر جهانی */

    global  $weather_all5days  ;static $weather_all5days  ;
    $weather_all5days = $message.$today.$tomorrow. $in2days . $in3days.$in4days.$in5days ;

}

?>

<?php include_once ('KavehNegar/vendor/autoload.php'); ?>

<?php
$error = false;

if (isset($_GET['sendsms'])) {
    $phone = trim($_GET['phonenumber']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);
    if (empty($phone)) {
        $error = true;
        $phoneError = "وارد کنید شماره موبایل";
    }

    if (strlen($phone) != 11) {
        $error = true;
        $phoneError = "شماره موبایل باید 11 شماره داشته باشد";
    }
}
?>
<!---->
<!Doctype>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>پیش بینی آب و هوا  </title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link href="css/bootsnav.css" rel="stylesheet" >

</head>
<body>
<div class="container" style="direction: rtl">

<!--    --><?php // include 'include/navbar.php';?>
    <div>
<!--        navbar -->
        <?php  echo '<p style="position: absolute">';
        echo 'تاریخ میلادی : '.date('D d/M m/Y').'<br>' ;
        echo '</p>';
        echo '<br>';
        $date = new DateTime("now", new DateTimeZone("Asia/Tehran")); // وقت محلی تهران
        echo '<p style="float: right">'.'ساعت و تاریخ به وقت ایران : ';
//        echo $date->format("H:i"),PHP_EOL;
        require_once dirname(__FILE__) . '/jdatetime.class.php';

        $date = new jDateTime(true, true, 'Asia/Tehran'); //تاریخ تقویم جلالی
        echo $date->date("H:i l j F Y ");

        echo '</p>';


        ?>

    </div>


    <div class="container-fluid">
        <img src="worldpoliticallarge.jpg" style="width: 100%;height: 100%">
    <div class="row">


        <div class=" col-xs-4 col-md-6" style="margin-top: 50px;">
            <form action="" method="get">
      شهر :         <input type="text" name="city" style="padding-right: 172px;margin-left: 67px;"> <br>
        <?php echo 'کشور : '; include 'include/countries.php'; ?>
                <input type="submit" name="send" value="جستجو">
            </form>
            <form action="" method="get">
                <span class="text-danger"><?php if (!empty($phoneError))echo $phoneError; ?></span>
                شماره موبایل :<input type="number" name="phonenumber" maxlength="11">
                <input type="submit" name="sendsms" value="پیامک کن" >
            </form>
            <form action="" method="get">
                <!--                <span class="text-danger">--><?php //if (!empty($phoneError))echo $phoneError; ?><!--</span>-->
                ایمیل : <input type="email" name="email" >
                <input type="submit" name="sendemail" value="ایمیل کن" >
            </form>
        </div>
<!--        <div class="col-xs-4">-->
<!--            <form method="get">-->
<!--                <input type="text" name="city" style="padding-right: 172px;margin-left: 67px;"> <br>-->
<!--                --><?php //echo 'کشور : '; include 'include/countries.php'; ?>
<!--                ایمیل : <input type="email" name="email" >-->
<!--                شماره موبایل :<input type="number" name="phonenumber" maxlength="11">-->
<!--                <input type="submit" name="sendform" value="جستجو">-->
<!---->
<!--            </form>-->
<!--        </div>-->

    </div>
        <div class=" " style="float: right "><?php
            if (isset($_GET['send'])) {
                echo $weather_all5days;
                // نشان دادن پیام اب و هوا
            }
//            if (isset($_GET['sendform'])){
//
//            }
            ?>
        </div>
<!--<br><br><br><br><br><br><br>-->
        <div class="row col-md-12">

<!--            <div class="col-xs-4 col-md-6" style="margin-top: 50px;">-->


<!--            </div>-->
<!--            <div class="col-xs-4 col-md-6" style="margin-top: 50px;">-->

<!--            </div>-->
        </div>
    </div>

<br>

    <?php /* ایمیل کردن اب و هوا */
    error_reporting(-1);
    ini_set('display_errors', 'On');
//    echo "<pre>"; set_error_handler("var_dump"); echo "</pre>";

    ini_set("mail.log", "/tmp/mail.log");
    ini_set("mail.add_x_header", TRUE);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_GET['sendemail']) ) {
        if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "فرمت ایمیل معتبر نیست.";
        }
        if(empty($weather_all5days))
            echo 'اب و هوا اختصاص داده نشده ';
        $to      = $_GET['email'];
        $subject = 'اب و هوا امروز';
        $message =  'sdsdsds';
        $headers =
            'From: weather@mahwaj.ir' . "\r\n" .
//            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $mail = mail($to, $subject, 'sdfdsfsd', $headers);

        print_r($mail);
/*
        require 'vendor/autoload.php';
        require 'vendor/PHPMailer/phpmailer/src/Exception.php';
        require 'vendor/PHPMailer/phpmailer/src/PHPMailer.php';
        require 'vendor/PHPMailer/phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp1.mahwaj.ir;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'weather@mahwaj.ir';                 // SMTP username
        $mail->Password = 'weathermahwaj';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('weather@mahwaj.ir', 'Mailer');
        $mail->addAddress('hesammoosapour@gmail.com', 'Hesam Moosapour');     // Add a recipient
//        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('weather@mahwaj.ir', 'Information');
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');

        //Attachments
//        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "<pre>" .'Message could not be sent. Mailer Error: ', $mail->ErrorInfo ."</pre>    ";
    }
*/
    }
    ?>
    <?php


/* فرستادن پیامک sms اب و هوا برای کاربر*/
    if (isset($_GET['sendsms'] )) {
//        && isset($weather_all5days)
        try {
            $api = new \Kavenegar\KavenegarApi("6E4E4C787752444337476B59455A7A5A706673555A773D3D");
            $receptor = $_GET['phonenumber'];
            $sender = 100065995;//30006703323323
            $message = 'sdfdsfsf';
            $result = $api->Send($sender,$_GET['phonenumber'],$message);
            echo print_r($result);
            if($result){
                foreach($result as $r){
                    echo "messageid = $r->messageid";
                    echo "message = $r->message";
                    echo "status = $r->status";
                    echo "statustext = $r->statustext";
                    echo "sender = $r->sender";
                    echo "receptor = $r->receptor";
                    echo "date = $r->date";
                    echo "cost = $r->cost";
                }
            }
            return $sms_res[] = ['receptor' => $receptor, 'message' => $message];
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
        return false;
    }
    ?>
</div>

</body>
</html>

<?php include 'map.php';?>