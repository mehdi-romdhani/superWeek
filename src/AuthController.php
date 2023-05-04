<?php

namespace App;

use App\ModelUser;
use Faker;


class AuthController
{


    function register(string $email, string $firstname, string $lastname, string $password)
    {
        $userModel = new ModelUser();

        $firstname = htmlspecialchars(trim($firstname));
        $lastname = htmlspecialchars(trim($lastname));
        $email = htmlspecialchars(trim($email));
        $password = password_hash($password, PASSWORD_DEFAULT);
        $row = $userModel->rowCountUser($email);
        if ($row > 0) {
            echo "<p>user already exist</p>";
        } else {
            $userModel->insertUser($email, $firstname, $lastname, $password);
            echo "<p>register done </p>";
            echo "<a href=/Projets/superWeek/users/login>Go login </a>";
        }
    }

    function login(string $email, string $password)
    {

        $userModel = new ModelUser();
        $rowCheck = $userModel->rowCountUser($email);
        $passwordCheck = $userModel->login($email);
        $id = $userModel->login($email);

        if ($rowCheck == 0) {
            echo "<p>Ce Compte n'existe pas </p>";
            return;
        } elseif ($rowCheck > 0 && $password == password_verify($password, $passwordCheck['password'])) {
            // session_start();
            $_SESSION['user']['id'] = $id['id'];
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['password'] = password_hash($password, PASSWORD_DEFAULT);
            echo "<p>you are online</p>";
            return;
        }
    }

    function getDataUser(int $id)
    {

        $userModel = new ModelUser();
        $dataUser = $userModel->getInfoUser($id);
        echo json_encode($dataUser, JSON_PRETTY_PRINT);
        return;
    }

    function getId(int $id)
    {
        $userModel = new ModelUser();
        $dataUSER = $userModel->getId($id);

        echo json_encode($dataUSER, JSON_PRETTY_PRINT);
    }

    function insertBook(string $title, string $content, int $id_user)
    {
        
        $title = htmlspecialchars(trim($title));
        $content = htmlspecialchars(trim($content));

        if(empty($title) || empty($content)){
            echo "fill all the blanks";
        }else{

            $userModel = new ModelUser();
            
            $userModel->addBooks($title, $content,$id_user);
            
        }
    }

    function showBookUser(){
        $userModelBook = new ModelUser();
        $showBook = $userModelBook->showAllBooks();
        echo json_encode($showBook,JSON_PRETTY_PRINT);

    }

    function getBookId(int $id)
    {
        $userModel = new ModelUser();
        $bookID = $userModel->showBookById($id);

        echo json_encode($bookID, JSON_PRETTY_PRINT);
    }




}

// function insertBookFaker(){

    // $faker = Faker\Factory::create();
    // $userModel = new ModelUser();
    
    // $userModel->addBooks($faker->word(), $faker->paragraphs(3,true),$_SESSION['user']['id']);
// }


