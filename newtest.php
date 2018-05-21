<?php
/**
 * Created by PhpStorm.
 * User: Jennifer
 * Date: 3/30/2018
 * Time: 12:53 PM
 */



#include 'db.php';

$servername = "10.1.14.35";
$username = "magiccar_jenna";
$password = "Boogerdot87";
$dbname = "magiccar_carddb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// prepare and bind

#$stmt = $conn->prepare("INSERT INTO cards (multiverseid)
#VALUES (?)");
#$stmt->bind_param("i", $name->multiverseid);

require __DIR__ . '/vendor/autoload.php';

use \mtgsdk\Card;

$card = Card::find(439836);

$card->multiverseid;
// set parameters and execute


$sql = "INSERT INTO cards (multiverseid) VALUES ('$card->multiverseid')";

#$stmt->close();