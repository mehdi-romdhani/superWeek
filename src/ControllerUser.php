<?php
namespace App;

use App\ModelUser;
use Faker;

class ControllerUser{


    function insertUserFake(){

        $faker = Faker\Factory::create();
        $modelUser = new ModelUser();

        for ($i = 0; $i < 15 ; $i++) {
           $email = $faker->email();
           $firstname = $faker->firstname();
           $lastname = $faker->lastname();
           $modelUser->insertFakeUser($email,$firstname,$lastname);
        }
        
    }
}