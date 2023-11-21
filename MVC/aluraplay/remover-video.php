<?php

$HOST = "localhost";
$DBNAME = "alura_play";
$DBUSER = "root";
$DBPASS = "root";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if ($id == false) {
    header("Location: /?sucesso=0");
    exit();
}

$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASS);

$sql = "
    DELETE FROM videos 
        WHERE id = :id
";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header("Location: /?sucesso=1");
} else {
    header("Location: /?sucesso=0");
}

?>