<?php

namespace App;

use PDO;
use PDOException;

class ModelUser
{

  private ?PDO  $conn;
  function __construct()
  {
    //empty
    $dsn = "mysql:host=localhost;dbname=superweek";

    try {

      $this->conn = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {

      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }
  }

  function insertUser()
  {
  }

  function insertFakeUser($email, $firstname, $lastname)
  {

    $stmt = $this->conn->prepare('INSERT INTO user(email,first_name,last_name) VALUES(:email,:firstname,:lastname)');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->execute();
  }
}
