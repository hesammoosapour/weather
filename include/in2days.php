<?php $status =  $data ['list']['2']['weather']['0']['main'];
if($status == 'Clouds') $status = 'ابری';
if($status == 'Rain') $status = 'بارانی';
if($status == 'Clear') $status = 'افتابی';
?>

<?php $in2days = "   <p style='float:right'>پس فردا :</p>
<table style=\"width:100%; direction:rtl \" >

<tr>
    <td style='color: #005cbf'><img src=''>دما روز</td>
    <td style='color: #005cbf'><img src=''>دما شب </td>

    <td style='color: #6f42c1'><img src=''>دما عصر</td>
    <td style='color: #491217'><img src=''>دما صبح</td>
    <td style='color:#1c7430;'><img src=''>وضعیت </td>
    <td style='color: #20c997'><img src=''>سرعت</td>
    <td style='color: #fd7e14'><img src=''>درجه</td>
</tr>
<tr>
    <td style='color: #005cbf'>".$data ['list']['2']['temp']['day']."</td>
    <td style='color: #005cbf'>".$data ['list']['2']['temp']['night']."</td>

    <td style='color: #6f42c1'>".$data ['list']['2']['temp']['eve']."</td>
    <td style='color: #491217'>".$data ['list']['2']['temp']['morn']."</td>
    <td style='color:#1c7431;'>".$status."</td>
    <td style='color: #20c997'>".$data ['list']['2']['speed']."</td>
    <td style='color: #fd7e14'>".$data ['list']['2']['deg']."</td>

</tr>

</table>";