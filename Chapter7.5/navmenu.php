<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 2/24/2017
 * Time: 9:56 PM
 */
    // Generate the navigation menu
    echo '<hr />';

    if(isset($_SESSION['username'])){

        echo '<a href="index.php">Home</a> &#10084; ';
        echo '<a href="viewprofile.php">View Profile</a> &#10084; ';
        echo '<a href="editprofile.php">Edit Profile</a> &#10084; ';
        echo '<a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
    }

    else {

        echo '<a href="login.php">Log In</a> &#10084; ';
        echo '<a href="signup.php">Sign Up</a>';
    }

?>