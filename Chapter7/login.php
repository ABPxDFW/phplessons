<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 2/12/2017
 * Time: 9:41 PM
 */
    require_once('connectvars.php');

    if(!isset($_SERVER['PHP_AUTH_USER']) || !ISSET($_SERVER['PHP_AUTH_PW'])) {
        // The username/password weren't entered so send the authentication headers.

        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Mismatch"');
        exit('<h3>Mismatch</h3>Sorry, you must enter your username and password to log in and access this page.');
    }


    // Connect to the database
    $dbc = mysqli_connected(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Grab the user-entered log-in data
    $user_username = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_USER']));
    $user_password = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_PW']));

    // Look up the username and password in the database
    $query = "SELECT user_id, username FROM mismatch_user WHERE username = '$user_username' AND password = SHA('$user_password')";
    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1) {
        // The log-in is OK so set the user ID and username variables
        $row = mysqli_fetch_array($data);
        $user_id = $row['user_id'];
        $username = $row['username'];
    }

    else {
        // The username/password are incorrect so send the authentication headers
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Mismatch"');
        exit('<h2>Mismatch</h2>Sorry, you must enter your username and password to log in and access this page.');
    }

    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $username . ' . </p>');