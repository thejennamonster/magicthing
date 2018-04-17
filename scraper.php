<?php
/**
 * Created by PhpStorm.
 * User: Jennifer
 * Date: 3/30/2018
 * Time: 12:53 PM
 */

include 'db.php';

require __DIR__ . '/vendor/autoload.php';

use \mtgsdk\Card;

$card = Card::find(439836);


// spit out relevant information from datadump

$card->multiverseid;
$card->name;
$card->rarity;
$colors = implode(",", $card->colors);
$card->manaCost;
$card->cmc;
$card->type;
$card->power;
$card->toughness;
$card->setName;
$card->text;
$card->imageUrl;
#die();

//clear database to avoid multiple entries

mysqli_query($mysqli, "TRUNCATE TABLE `cards`");

//Write to database

        $sql = "INSERT INTO cards (multiverseid, name, rarity, colors, mana, cmc, type, power, toughness, version, text, image) 
                VALUES ('{$card->multiverseid}','{$card->name}','{$card->rarity}','$colors','{$card->manaCost}','{$card->cmc}','{$card->type}','{$card->power}','{$card->toughness}','{$card->setName}','{$card->text}','{$card->imageUrl}')";


         if ($mysqli->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }








