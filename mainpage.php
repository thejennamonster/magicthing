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
            background-color: #F2F5A9;
        }
        #Grid tr.even
        {
            color: #000000;
            background-color: white;
        }
        #Grid head
        {
            color: #000000;
            background-color:teal;
        }

    </style>
</head>

<body>

<form action="search.php" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
</form>


<h1>Magic Cards</h1>
<?php


include 'db.php';

//Query DB

if  ($stmt = $mysqli->prepare("SELECT DISTINCT name FROM cards ORDER BY name LIMIT 999999 OFFSET 3")) {
        $stmt->bind_result($name);
    $stmt->execute();




//Create the table headers

    echo "<table id='Grid' style='width:80%'><tr>";
    echo "<th style='width:50px'>Name</th>";
    echo "</tr>\n";

    $class = "odd"; //Keep track if row is odd or even; can be styled later

    //Populate stuff

    while ($stmt->fetch()) {

      echo '<td><a href="viewcards.php?CARDNAME=' . $name . '">' . $name . "</a></td>";
      echo "</td></tr>\n";
    }


} else {
               $error = $mysqli->errno . ' ' . $mysqli->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
          }


    if($class=="odd"){
        $class="even";
    }
    else {
        $class="odd";
    }


echo "</table>";
$mysqli->close();

?>

</body>


</html>