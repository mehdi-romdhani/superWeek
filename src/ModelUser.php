<?php
//dont forget to type var !!! 
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

 

  function insertFakeUser(string $email,string $firstname,string $lastname,string $password) :void 
  {

    $stmt = $this->conn->prepare('INSERT INTO user(email,first_name,last_name,password) VALUES(:email,:firstname,:lastname,:password)');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':password', $password);

    $stmt->execute(); 
  }

  function showUser(){
    $query = "SELECT * FROM user";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result ;

  }

  function insertUser(string $email,string $firstname,string $lastname,string $password) :void
  {
    
    $query = "INSERT INTO user(email,first_name,last_name,password) VALUE(:email,:firstname,:lastname,:password)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':firstname',$firstname);
    $stmt->bindParam(':lastname',$lastname);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
  }

  function login($email){
    $queryLogin = "SELECT password FROM user WHERE email =:email ";
    $stmt = $this->conn->prepare($queryLogin);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }


  function rowCountUser(string $email){

    $queryCheck = "SELECT * FROM user WHERE email = :email";
    $stmt1 = $this->conn->prepare($queryCheck);
    $stmt1->bindParam(':email',$email);
    $stmt1->execute();
    $result = $stmt1->rowCount();
    return $result;

  }






  
}
