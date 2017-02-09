<?php
require_once('authorize.php');
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 2/6/2017
 * Time: 9:38 PM
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Guitar Wars - Remove a High Score</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
    <h2>Guitar Wars - Approve a High Score</h2>

        <?php
            require_once('appvars.php');
            require_once('connectvars.php');

            $score = $_GET['score'];
            $id = $_GET['id'];
            $name = $_GET['name'];

            if(isset($_POST['submit'])) {
                if($_POST['confirm'] == 'Yes') {
                    // Connect to the database
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                    // Approve the score by setting the approved column in the database

                    $query = "UPDATE guitarwars SET approved=1 WHERE id='$id'";
                    mysqli_query($dbc, $query) or die("failed to run query");
                    mysqli_close($dbc);

                    // Confirm success with the user
                    echo '<p>The high score of ' . $score . ' for ' . $name . ' was successfully approved.';
                }
                else {
                    echo '<p class="error">Sorry, there was a problem approving the high score.</p>';
                }
            }

            echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';

        ?>


    </body>
</html>