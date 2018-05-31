<html>
<head>
    <title>Magic Cards</title>

    <style>
        /*The grid is used to format a table*/

        #Grid
        {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            width:80%;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }
        #Grid td, #Grid th{
            font-size: 1em;
            border: 1px solid #61ADD7;
            padding: 3px 7px 2px 7px;
        }

        #Grid th
        {
            font-size: 1.1em;
            text-align: left;
            padding-top: 5px;
            padding-bottom: 4px;
            background-color: #C2D9FE;
            color: lightslategray;
        }
        #Grid tr.odd td
        {
            color:#000000;
            background-color:#F2F5A9;
        }
        #Grid tr.even
        {
            color: #000000;
            background-color:white;
        }
        #Grid head
        {
            color: #000000;
            background-color:teal;
        }

    </style>
</head>

<body>


<?php

include 'db.php';
// Before using $_GET['CARDNAME']
if (isset($_GET['CARDNAME'])) {
    // Instructions if $_GET['value'] exist

    $card_name = $_GET['CARDNAME'];

}
/*Try to query the database*/


   if  ($stmt = $mysqli->prepare("SELECT DISTINCT name, rarity, colors, mana, cmc, type, power, toughness, version, text, image FROM cards WHERE multiverseid != 0 AND name = ? LIMIT 1")) {
       $stmt->bind_param("s", $card_name);
       $stmt->execute();

       $stmt->bind_result($name, $rarity, $colors, $mana, $cmc, $type, $power, $toughness, $version, $text, $image);
       $stmt->execute();



       echo "<h1>" . "$card_name" . "</h1>";

//Create the table headers
       echo "<table id='Grid' style='width:80%' table align='right'><tr>";
       echo "</tr>\n";

       $class = "odd"; //Keep track if row is odd or even; can be styled later

//Loop through all the rows returned by the query, creating a table row for each



       while ($stmt->fetch()) {

           echo "<tr>" . "<td>" . "<p>Name:</p>" . "</td>" . "<td>" . "$card_name" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p> Rarity:</p>" . "</td>" . "<td>" . "$rarity" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p>Colors:</p>" . "</td>" . "<td>" . "$colors" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p>Mana:</p>" . "</td>" . "<td>" . "$mana" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p>Converted Mana Cost:</p>" . "</td>" . "<td>" . "$cmc" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p>Type:</p>" . "</td>" . "<td>" . "$type" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p>Power:</p>" . "</td>" . "<td>" . "$power" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p>Toughness:</p>" . "</td>" . "<td>" . "$toughness" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p> Series:</p>" . "</td>" . "<td>" . "$version" . "</td>" . "</tr>";
           echo "<tr>" . "<td>" . "<p>Card Text:</p>" . "</td>" . "<td>" . "$text" . "</td>" . "</tr>";


            echo "<img src='$image' width='223' height='310'>";

       }
       } else {
               $error = $mysqli->errno . ' ' . $mysqli->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
          }



$mysqli->close();
?>


</body>





</html>