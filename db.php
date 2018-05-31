<?php

$mysqli = new mysqli('10.1.14.35','magiccar_jenna','Boogerdot87','magiccar_carddb');

/* check connection */

if (mysqli_connect_errno()){
    printf("Connect failed: %\n",mysqli_connect_errno());
    exit();
}
//select database to work with

$mysqli->select_db("magiccar_carddb");

