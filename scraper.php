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


$cards = Card::where(['name' => 'Nissa'])->all();



// prepare insert


$stmt = $mysqli->prepare("INSERT INTO cards (multiverseid, name, rarity, colors, mana, cmc, type, power, toughness, version, text, image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE multiverseid = VALUES(multiverseid)");

// check to see if properties are set and, if so, make them a variable
echo count($cards)."\n";
foreach ($cards as $info) {
    $multiverseid = '';
    $name = '';
    $rarity = '';
    $manacost = '';
    $colors = '';
    $cmc = '';
    $type = '';
    $power = '';
    $toughness = '';
    $setname = '';
    $text = '';
    $image = '';

    if (isset($info->multiverseid)) {
        $multiverseid = $info->multiverseid;
    }

    if (isset($info->name)) {
        $name = $info->name;
    }

    if (isset($info->rarity)) {
        $rarity=$info->rarity;
    }

    if (isset($info->colors)) {
        $colors = implode(",", $info->colors);
    }

    if (isset($info->manaCost)) {
        $manacost=$info->manaCost;
    }

    if (isset($info->cmc)) {
        $cmc=$info->cmc;
    }

    if (isset($info->type)) {
        $type = $info->type;
    }

    if (isset($info->power)) {
        $power=$info->power;
    }

    if (isset($info->toughness)) {
        $toughness = $info->toughness;
    }

    if (isset($info->setName)) {
        $setname=$info->setName;
    }

    if (isset($info->text)) {
        $text=$info->text;
    }

    if (isset($info->imageUrl)) {
        $image=$info->imageUrl;
    }

    //Write to database

    $stmt->bind_param("ssssssssssss", $multiverseid,$name, $rarity, $colors, $manacost, $cmc, $type, $power, $toughness, $setname, $text, $image);
    $stmt->execute();
    if ($stmt->errno){
        echo "error: {$stmt->error}\n";

    }
}

//close the statement

$stmt->close();






