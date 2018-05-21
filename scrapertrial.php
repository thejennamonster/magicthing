<?php
/**
 * Created by PhpStorm.
 * User: Jennifer
 * Date: 3/30/2018
 * Time: 12:53 PM
 */



#include 'db.php';

require __DIR__ . '/vendor/autoload.php';

use \mtgsdk\Card;

#function magic() {
#$card = Card::find(439836);
$cards = Card::where(['name' => 'Nissa'])->all();
#var_export($cards);

// spit out relevant information from datadump


    Foreach ($cards as $info) {

        if (isset($info->multiverseid)) {
            $info->multiverseid . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->name)) {
            $info->name . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->rarity)) {
            $info->rarity . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->colors)) {
            $colors = implode(",", $info->colors) . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->manaCost)) {
            $info->manaCost . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->cmc)) {
            $info->cmc . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->type)) {
            $info->type . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->power)) {
            $info->power . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->toughness)) {
            $info->toughness . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->setName)) {
            $info->setName . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->text)) {
            $info->text . "\n";
        } else {
            echo "n/a" . "\n";
        }
        if (isset($info->imageUrl)) {
            $info->imageUrl . "\n";
        } else {
            echo "n/a" . "\n";
        }


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


        include 'db.php';
//clear database to avoid multiple entries

        #mysqli_query($mysqli, "TRUNCATE TABLE `cards`");

//Write to database



        $sql = "INSERT INTO cards (rarity) VALUES ('{$info->rarity}')";

        #array_walk_recursive($info, 'magic');
        #$info = $mysqli->real_escape_string($info);


        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
  }

#magic();
#,, name, rarity, color colors, mana, cmc, type, power, toughness, version, text, image
#,'{$info->multiverseid}',,'{$info->rarity}','$colors')'{$info->manaCost}','{$info->cmc}','{$info->type}','{$info->power}','{$info->toughness}','{$info->setName}','{$info->text}','{$info->imageUrl}'





