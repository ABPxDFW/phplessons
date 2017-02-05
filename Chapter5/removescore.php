<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html: charset=utf-8"/>
        <title>Guitar Wars - Remove a High Score</title>
        <link rel="stylesheet" type="text/css" href="style24.css" />
    </head>
    <body>
        <h2>Guitar Wars - Remove a High Score</h2>
        <?php
        /**
         * Created by PhpStorm.
         * User: abpxninja
         * Date: 2/4/2017
         * Time: 10:38 PM
         */
        require_once('appvars.php');
        require_once('connectvars.php');

        if(isset($_GET['score']) && isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) &&
            isset($_GET['screenshot'])){

            // Grab the score data from the GET
            $id = $_GET['id'];
            $date = $_GET['date'];
            $name = $_GET['name'];
            $score = $_GET['score'];
            $screenshot = $_GET['screenshot'];
        }




        ?>
    </body>
</html>
