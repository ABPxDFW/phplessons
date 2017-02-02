<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 12/21/2016
 * Time: 6:32 PM
 */

    require_once('appvars.php');
    require_once('connectvars.php');

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Unable to connect to database.");

    // Retrieve the score data from MySQL
    $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
    $data = mysqli_query($dbc, $query) or die("Unable to run query.");

    // Loop through the array of score data, formatting it as HTML

    echo '<table>';

    while ($row = mysqli_fetch_array($data)){
        // Display the score data

        echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';

        echo '<td>' . $row['date'] . '</td>';

        echo '<td>' . $row['score'] . '</td>';

        echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
            '&amp;name=' . $row['name'] . '&amp;score=' . $row['score']. '&amp;screenshot=' .
            $row['screenshot'] . '">Remove</a></td></tr>';
    }

    echo '</table>';

    mysqli_close($dbc);

?>