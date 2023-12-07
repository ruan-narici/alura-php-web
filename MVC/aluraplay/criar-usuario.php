<?php

$HOST = "localhost";
$DBNAME = "alura_play";
$USER = "root";
$PASSWORD = "root";

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $USER, $PASSWORD);

$emailAccount = "exemplo@exemplo.com";
$passwordAccount = password_hash("123", PASSWORD_ARGON2I);

$sql = "
    INSERT INTO users (email, password) 
        VALUES (:email, :password);
";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":email", $emailAccount);
$stmt->bindValue(":password", $passwordAccount);
$stmt->execute();

?>