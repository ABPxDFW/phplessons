<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 12/11/2016
 * Time: 11:20 PM
 */

$from = 'InfiniteSoaring24@gmail.com';
$subject = $_POST['subject'];
$text = $_POST['elvismail'];


$dbc = mysqli_connect('localhost', 'ABPxNiNjA','test','elvis_store')
    or die('Error connecting to MySQL Server.');

$query = "SELECT * FROM email_list";
$result = mysqli_query($dbc, $query)
    or die('Error querying databse.');

while($row = mysqli_fetch_array($result)){
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];

    $msg =  "Dear $first_name $last_name, \n $text";

    $to = $row['email'];

    mail($to,$subject,$msg,'From:' . $from);

    echo 'Email sent to: ' . $to . '<br />';
}

mysqli_close($dbc);

?>

