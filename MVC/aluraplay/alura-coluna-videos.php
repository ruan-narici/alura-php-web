<?php

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASS = "root";
$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASS);

$sql = "ALTER TABLE videos ADD COLUMN image_path VARCHAR(255)";

$conn->exec($sql);

?>