




<html>
<head>
    <title>Search results</title>

</head>
<body>
<?php

include 'db.php';

//Get the query

$search = $_GET['query'].'%';

//Find the results

$stmt = $mysqli->prepare("SELECT DISTINCT name FROM cards WHERE name LIKE ? or type LIKE ? OR rarity LIKE ?");
$stmt->bind_param('sss', $search,$search, $search);
$stmt->execute();
$result = $stmt->get_result();

//Spit out results

if ($result->num_rows > 0) {
    echo "<table><tr><th>Results</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo '<tr><td><a href="viewcards.php?CARDNAME=' . $row["name"] . '">' . $row["name"] . "</a></td></tr>";
           }
    echo "</table>";
} else {
    echo "0 results";
}



?>
</body>
</html>