<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 3/5/2017
 * Time: 11:20 PM
 */

    // Start the session
    require_once('startsession.php');

    // Insert the page header
    $page_title = 'Questionnaire';
    require_once('header.php');

    require_once('appvars.php');
    require_once('connectvars.php');

    // Make sure the user is logged in before going any further.
    if(!isset($_SESSION['user_id'])) {
        echo '<p class="login">Please <a href=login.php">log in</a> to access this page.</p>';
        exit();
    }

    // Show the navigation menu
    require_once('navmenu.php');

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
