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

$card = Card::find(382217);
#$card = Card::where(['name' => 'nis'])->all();


#var_export($card);


//result now contains the output from card//

$result=print_r($card, true);


//vomit card output that lives in result into a file//

file_put_contents('test.txt', print_r($result, true));

//open/read the file//

$text_file=fopen('test.txt', 'r');

//while going through each line, check if the line starts with name and then print that info to another file. stop after first hit//

while($line=fgets($text_file)) {
    if (strpos($line, '[name]')){
        $output = print_r($line, true);
        file_put_contents('output.txt', print_r($output, true));
        break;

    }
}

//does same as above, but appends the file with new info//

while($line=fgets($text_file)) {
    if (strpos($line, '[manaCost]')) {
        $output = print_r($line, true);
        file_put_contents('output.txt', print_r($output, true), FILE_APPEND);
        break;
    }

}

while($line=fgets($text_file)) {
    if (strpos($line, '[type]')) {
        $output = print_r($line, true);
        file_put_contents('output.txt', print_r($output, true), FILE_APPEND);
        break;
    }

}

while($line=fgets($text_file)) {
    if (strpos($line, '[rarity]')) {
        $output = print_r($line, true);
        file_put_contents('output.txt', print_r($output, true), FILE_APPEND);
        break;
    }

}
while($line=fgets($text_file)) {
    if (strpos($line, '[setName]')) {
        $output = print_r($line, true);
        file_put_contents('output.txt', print_r($output, true), FILE_APPEND);
         break;
    }

}
while($line=fgets($text_file)) {
    if (strpos($line, '[text]')) {
        $output = print_r($line, true);
       file_put_contents('output.txt', print_r($output, true), FILE_APPEND);
        break;
    }

}
//write info from file to database//


$database_info=fopen('output.txt', 'r');

while($line=fgets($database_info)) {
    if (strpos($line, '[name]')) {
        $output1 = print_r($line, true);
        $subout = substr($output1, 21);

    }
    if (strpos($line, '[manaCost]')) {
        $output2 = print_r($line, true);
        $subout2 = substr($output2, 25);
    }
    if (strpos($line, '[type]')) {
        $output3 = print_r($line, true);
        $subout3 = substr($output3, 21);
    }
    if (strpos($line, '[rarity]')) {
        $output4 = print_r($line, true);
        $subout4 = substr($output4, 24);
    }
    if (strpos($line, '[setName]')) {
        $output5 = print_r($line, true);
        $subout5 = substr($output5, 25);
    }

    if (strpos($line, '[text]')) {
        $output6 = print_r($line, true);
        $subout6 = substr($output6, 21);
    }
        $sql = "INSERT INTO cards (name, mana, type, rarity, version, text) VALUES ('$subout','$subout2','$subout3','$subout4','$subout5','$subout6')";
}

         if ($mysqli->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }








