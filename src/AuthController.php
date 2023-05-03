<?php   
namespace App;

use App\ModelUser;


class AuthController{

  

    // function getUserExist(){

    // }

    function register(string $firstname,string $lastname, string $email,string $password)
    {
        $userModel = new ModelUser();

        $firstname = htmlspecialchars(trim($firstname));
        $lastname = htmlspecialchars(trim($lastname));
        $email = htmlspecialchars(trim($email));
        $password = password_hash($password,PASSWORD_DEFAULT);

        if($userModel->rowCountUser($email) > 0 ){
            return "<p>user already exist</p>";
        }else{
            $userModel->insertUser($firstname,$lastname,$email,$password);
            return "<p>register done </p>";
        }
    }
}


