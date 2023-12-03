<?php
namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;

class LoginController implements Controller {

    private \PDO $pdo;

    public function __construct() {
        $HOST = "localhost";
        $DBNAME = "alura_play";
        $DBUSER = "root";
        $DBPASS = "root";
        $this->pdo = new \PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASS);
    }

    public function dataProcess() {
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");

        $sql = "SELECT * FROM users WHERE email = :email";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $email, \PDO::PARAM_STR);
        $stmt->execute();

        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);

        $correctPassword = password_verify($password, $userData["password"] ?? "");
        if ($correctPassword) {
            header("Location: /");
        } else {
            header("Location: /login?sucesso=0");
        }
    }
}

?>