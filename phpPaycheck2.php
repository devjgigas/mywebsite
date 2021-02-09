<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Paycheck Calculator</title>
       <link rel="stylesheet" href="css/sticky.css">

  

</head>

<body>
<tr>
<th>
<td>
<footer>
<?php
include('includes/phpPaycheck2.html');
//create a shorthand for form data
if(!empty($_REQUEST['fname'])){
$firstName = $_REQUEST['fname'];
}else{
    $fname=NULL;
    echo '<p> You Forgot To Enter Your First Name.';
}
if(!empty($_REQUEST['lname'])){
$lastName = $_REQUEST['lname'];
}else{
$lname=NULL;
echo '<p> You Forgot To Enter Your Last Name.</p>';
}
/*if (!empty($_POST['fname']) &&($_POST['lname'])&&( $_POST['hoursWorked'])&&($_POST['hourRate'])){
    # code...*/

// '<p> Please go back and fill out the form again.</p>';

if(!empty($_REQUEST['hoursWorked'])){
$hoursWorked =$_REQUEST['hoursWorked'];

if($hoursWorked<0||$hoursWorked>80){
 
    echo '<p>You must enter Hours Worked that is between 0 and 80.</p>';
}
}else{
    $hoursWorked=NULL;
    echo '<p>You must enter Hours Worked that is between 0 and 80.</p>';
}

/*if($hoursWorked>40){
   $overHours=$hoursWorked-$overHours;
}
if($hoursWorked<40){
    $regHours=$overHours-$regHours;
}*/






if(!empty($_REQUEST['hourRate'])){
$hourRate =$_REQUEST['hourRate'];

if($hourRate<7.25||$hourRate>100.00)
 echo '<p> You must enter an Hourly Rate that is between 7.25 and 100.00.</p>';


}

else{
$hourRate=NULL;
echo '<p> You must enter an Hourly Rate that is between 7.25 and 100.00.</p>';
}



//Variables
if($hoursWorked>40){
$overHours=$hoursWorked-40;}

$regHours=$hoursWorked-$overHours;
$ficaRate=5.65;
$stateTaxRate=5.75;
$fedTaxRate=28.00;
$employeeName = $firstName . $lastName;

//Calculations

$employeeName = $firstName .' ' . $lastName;

$regPay=$regHours*$hourRate;
$overTime = $overHours * (1.5 * $hourRate);
$grossPay=$regPay+$overTime;
$ficaHeld=$grossPay*($ficaRate/100);
$stateTaxHeld=$grossPay*($stateTaxRate/100);
$fedTaxHeld=$grossPay*($fedTaxRate/100);
$totalTax=$ficaHeld+$stateTaxHeld+$fedTaxHeld;
$netPay=$grossPay-$totalTax;


//Formatting

$netPay=number_format($netPay,2);
$totalTax=number_format($totalTax,2);
$fedTaxHeld=number_format($fedTaxHeld,2);
$fedTaxRate=number_format($fedTaxRate,2);
$stateTaxHeld=number_format($stateTaxHeld,2);
$ficaHeld=number_format($ficaHeld,2);
$grossPay=number_format($grossPay,2);
$overtime=number_format($overTime,2);

//Table


if (!empty($_POST['fname'])&&($_POST['lname'])&&( $_POST['hoursWorked']<=80)&&($_POST['hourRate']<=100)&&($_POST['hourRate']>7.25)){

echo "<table <th><h1>Paycheck Calculator</h1></th>

<tr><th><strong>Employee Name</strong></th> 
<td>$employeeName</td></tr>

<tr><th><strong> Regular Hours Worked (between 0 and 40)</strong></th> 
<td>$regHours</td></tr>

<tr><th>Overtime Hours Worked (between 0 and 40) </th>
<td>$overHours</td></tr>

<tr><th><strong>Hourly Rate </strong></th>
<td>$$hourRate </td></tr>

<tr><th><strong>Regular Pay</strong></th>
<td>$$regPay</td></tr>

<tr><th><strong>Overtime Pay </strong></th>
<td>$$overTime</td> </tr>
<tr><th><strong>Gross Pay </strong></th>
<td>$$grossPay</td></tr>

<tr><th><strong>FICA Taxes Rate </strong></th>
<td>$ficaRate%</td> </tr>

<tr><th><strong>FICA Taxes Withheld </strong></th>
<td>$$ficaHeld</td> </tr>

<tr><th><strong>State Tax Rate (5.65)</strong></th>
<td>$stateTaxRate%</td> </tr>

<tr><th><strong>State Taxes Withheld </strong></th>
<td>$$stateTaxHeld</td> </tr>

<tr><th><strong>Federal Tax Rate(ex.28.00)</strong></th>
<td>$fedTaxRate%</td> </tr>
<tr><th><strong>Federal Taxes Withheld </strong></th>
<td>$$fedTaxHeld</td> </tr>
<tr><th><strong>Total Taxes </strong></th>
<td>$$totalTax</td> </tr>
<tr><th><strong>Net Pay </strong></th>
<td>$$netPay</td></tr>


</table>";
}else{
    echo'<p> Please go back and fill out the form again.</p>';
}

?>

</body>

</html>