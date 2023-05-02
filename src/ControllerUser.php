<?php
namespace App;

use App\ModelUser;
use Faker;

class ControllerUser{


    function insertUserFake(){

        $faker = Faker\Factory::create("fr_FR");
        $modelUser = new ModelUser();

        for ($i = 0; $i < 15 ; $i++) {

            $firstname = $faker->firstname();
            $lastname = $faker->lastname();
            $email = strtolower($firstname . $lastname . '@' . $faker->freeEmailDomain());
            $modelUser->insertFakeUser($email,$firstname,$lastname);

        }

    }
        function showAllUser(){
            $modelUser = new ModelUser();
            echo json_encode($modelUser->showUser(),JSON_PRETTY_PRINT);
            die(); 
        }
        
}