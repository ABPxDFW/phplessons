<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 12/11/2016
 * Time: 8:59 PM
 */

$dbc = mysqli_connect('localhost','ABPxNiNjA','test','elvis_store')
or die ('Error connecting to MySQL server.');

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];

$query = "INSERT INTO email_list (first_name, last_name, email) " .
    "VALUES ('$first_name','$last_name','$email')";

$result = mysqli_query($dbc, $query)
or die('Error querying database.');

mysqli_close($dbc);

echo 'Customer added.';


?>

