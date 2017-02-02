<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 12/12/2016
 * Time: 6:45 PM
 */

$dbc = mysqli_connect('localhost','ABPxNiNjA','test','elvis_store')
    or die('Error connecting to MySQL server.');

$email = $_POST['email'];

$query = "DELETE FROM email_list WHERE email ='$email'";

mysqli_query($dbc, $query)
    or die('Error querying database');

echo 'Customer removed: ' . $email;

mysqli_close($dbc);

?>

