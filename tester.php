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


require __DIR__ . '/vendor/autoload.php';

use \mtgsdk\Card;

#function magic() {
#$card = Card::find(439836);

#var_export($cards);

// spit out relevant information from datadump

// prepare and bind

$stmt = $conn->prepare("INSERT INTO cards (multiverseid, name, rarity, colors, mana, cmc, type, power, toughness, version, text, image) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("dddddddddddd", $info->multiverseid,$info->name,$info->rarity,$info->colors,$info->manaCost,$info->cmc,$info->type,$info->power,$info->toughness,$info->setName,$info->text,$info->imageUrl);



Foreach ($cards as $info) {

    if (isset($info->multiverseid)) {
        $info->multiverseid . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->name)) {
        $info->name . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->rarity)) {
        $info->rarity . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->colors)) {
        $colors = implode(",", $info->colors) . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->manaCost)) {
        $info->manaCost . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->cmc)) {
        $info->cmc . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->type)) {
        $info->type . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->power)) {
        $info->power . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->toughness)) {
        $info->toughness . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->setName)) {
        $info->setName . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->text)) {
        $info->text . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
    if (isset($info->imageUrl)) {
        $info->imageUrl . "\n";
    } else {
        echo "n/a" . "\n";
    }
    $stmt->execute();
}

$stmt->close();
// spit out relevant information from datadump

#$card->multiverseid;
#$card->name;
#$card->rarity;
#$colors = implode(",", $card->colors);
#$card->manaCost;
#$card->cmc;
#$card->type;
#$card->power;
#$card->toughness;
#$card->setName;
#$card->text;
#$card->imageUrl;


//clear database to avoid multiple entries

    #mysqli_query($mysqli, "TRUNCATE TABLE `cards`");

//Write to database



   # $sql = "INSERT INTO cards (rarity) VALUES ('{$info->rarity}')";

    #array_walk_recursive($info, 'magic');
    #$info = $mysqli->real_escape_string($info);


    #if ($mysqli->query($stmt) === TRUE) {
     #   echo "New record created successfully";
    #} else {
     #   echo "Error: " . $stmt . "<br>" . $mysqli->error;
    #}
#}

#magic();
#,, name, rarity, color colors, mana, cmc, type, power, toughness, version, text, image
#,'{$info->multiverseid}',,'{$info->rarity}','$colors')'{$info->manaCost}','{$info->cmc}','{$info->type}','{$info->power}','{$info->toughness}','{$info->setName}','{$info->text}','{$info->imageUrl}'





