<?php   
namespace App;

use App\ModelUser;


class AuthController{

  

    // function getUserExist(){

    // }

    function register(string $email,string $firstname, string $lastname,string $password)
    {
        $userModel = new ModelUser();

        $firstname = htmlspecialchars(trim($firstname));
        $lastname = htmlspecialchars(trim($lastname));
        $email = htmlspecialchars(trim($email));
        $password = password_hash($password,PASSWORD_DEFAULT);
        $row=$userModel->rowCountUser($email);
        if($row > 0 ){
            echo "<p>user already exist</p>";
        }else{
            $userModel->insertUser($email,$firstname,$lastname,$password);
            echo "<p>register done </p>";
            echo "<a href=/Projets/superWeek/users/login>Go login </a>";
        }
    }

    function login(string $email, string $password){

        $userModel = new ModelUser();
        $rowCheck = $userModel->rowCountUser($email);
        $passwordCheck = $userModel->login($email);
        
        if($rowCheck == 0){
            echo "<p>Ce Compte n'existe pas </p>";
            return;
        }elseif($rowCheck > 0 && $password == password_verify($password,$passwordCheck['password']) ){
            session_start();
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['password'] = password_hash($password,PASSWORD_DEFAULT);
            echo "<p>you are online</p>";
            return ;

        }
    }
}


