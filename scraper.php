<?php
/**
 * Created by PhpStorm.
 * User: Jennifer
 * Date: 3/30/2018
 * Time: 12:53 PM
 */

#include 'db.php';

$mysqli = new mysqli('10.1.14.35','magiccar_jenna','Boogerdot87','magiccar_carddb');

/* check connection */
echo "connected";

if (mysqli_connect_errno()){
    printf("Connect failed: %\n",mysqli_connect_errno());
    exit();
}
//select database to work with

$mysqli->select_db("magiccar_carddb");

require __DIR__ . '/vendor/autoload.php';

use \mtgsdk\Card;

$card = Card::find(439836);
#$card = Card::where(['name' => 'nis'])->all();

// spit out relevant information from datadump

$multi= $card->multiverseid . "\n";
$name = $card->name . "\n";
$rarity = $card->rarity . "\n";
$colors = implode(",", $card->colors) . "\n";
$mana = $card->manaCost . "\n";
$cmc = $card->cmc . "\n";
$type = $card->type . "\n";
$power = $card->power . "\n";
$toughness = $card->toughness ."\n";
$version= $card->setName . "\n";
$text = $card->text . "\n";
$image = $card->imageUrl ."\n";
#die();


//Write to database

        $sql = "INSERT INTO cards (multiverseid, name, rarity, colors, mana, cmc, type, power, toughness, version, text, image) VALUES ('$multi','$name','$rarity','$colors','$mana','$cmc','$type','$power','$toughness','$version','$text','$image')";


         if ($mysqli->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }








