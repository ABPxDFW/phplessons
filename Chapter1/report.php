
<html>
<head>

    <title>Aliens Abducted Me - Report an Abduction</title>

</head>

<body>

    <h2>Aliens Abducted Me - Report an Abduction</h2>


<?php
/**
 * Created by PhpStorm.
 * User: abpxninja
 * Date: 12/8/2016
 * Time: 9:35 PM
 */

$when_it_happened = $_POST['whenithappened'];
$how_long = $_POST['howlong'];
$how_many = $_POST['howmany'];
$alien_description = $_POST['aliendescription'];
$what_they_did = $_POST['whattheydid'];
$fang_spotted = $_POST['fangspotted'];
$other = $_POST['other'];
$email = $_POST['email'];
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$name = $first_name . ' ' . $last_name;

echo 'Thanks for submitting the form.<br />';
echo 'You were abducted ' . $when_it_happened;
echo ' and were gone for ' . $how_long . '<br />';
echo 'Number of aliens: ' . $how_many . '<br />';
echo 'Describe them: ' . $alien_description . '<br />';
echo 'The aliens did this: ' . $what_they_did . '<br />';
echo 'Was Fang there? ' . $fang_spotted . '<br />';
echo 'Other comments: ' . $other . '<br />';
echo 'Your email address is ' . $email . '<br />';

echo $name;


/*$to = 'abpupeerapitug@yahoo.com';
$subject = 'Aliens Abducted Me - Abduction Report';
$msg = "$name was abducted $when_it_happened and was gone for $how_long.\n" .
    "Number of aliens: $how_many\n" .
    "Alien description: $alien_description\n" .
    "What they did: $what_they_did\n" .
    "Fang spotted: $fang_spotted\n" .
    "Other comments: $other";

mail($to, $subject, $msg, 'From: ' . $email);
*/
?>

</body>
</html>
