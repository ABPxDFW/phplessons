<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 2/12/2017
 * Time: 9:41 PM
 */
    require_once('startsession.php');

    $page_title = 'Log In';
    require_once('header.php');
    require_once('connectvars.php');

    // Clear the error message
    $error_msg = "";

    if(!isset($_SESSION['user_id'])) {

        if (isset($_POST['submit'])) {

            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Grab the user-entered log-in data
            $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

            if(!empty($user_username) && !empty($user_password)) {

                // Look up the username and password in the database
                $query = "SELECT user_id, username FROM mismatch_user WHERE username = '$user_username' AND password = SHA('$user_password')";

                $data = mysqli_query($dbc, $query);

                if(mysqli_num_rows($data) == 1) {

                    // The log-in is OK so set the user ID and username cookies, and redirect to the home page
                    $row = mysqli_fetch_array($data);

                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                    setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                    header('Location: ' . $home_url);
                }

                else {

                    // The username/password are incorrect so set an error message
                    $error_msg = 'Sorry, you must enter a valid username and password to log in.';
                }
            }

            else {

                // The username/password weren't entered so set an error message
                $error_msg = 'Sorry, you must enter your username and password to log in.';
            }
        }
    }

        // If the cookie is empty, show any error message and the log-in form; otherwise confirm the log-in
        if(empty($_SESSION['user_id'])) {

            echo '<p class="error">' . $error_msg . '</p>';
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Log In</legend>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" />
        </fieldset>
        <input type="submit" value="Log In" name="submit" />
    </form>

    <?php
        }

        else {

            // Confirm the successfl log in
            echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
        }

        require_once('footer.php');
    ?>
