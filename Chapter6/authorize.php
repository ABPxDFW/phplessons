<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 2/6/2017
 * Time: 9:17 PM
 */
//Username and password for authentication
$username = 'rock';
$password = 'roll';

if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] !=
        $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    //The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate:Basic realm="Guitar Wars"');
    exit('<h2>Guitar Wars</h2>Sorry, you must enter a valid username and password to access this page');
}
?>