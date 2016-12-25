<?php

/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.23.
 * Time: 20:30
 */

namespace Objects;

use Models\Users;

class User
{
    public $id;
    public $username;
    public $password;
    public $city;
    public $age;
    public $gender;

    public function generate($obj){
        $user = new User();
        $user->id = $obj->id;
        $user->username = $obj->username;
        $user->password = $obj->password;
        $user->city = $obj->city;
        $user->age = $obj->age;
        $user->gender = $obj->gender;
        return $user;
    }

    public function save(){
        $model = new Users();
        $user = $model->create($this->id);
        $user->username = $this->username;
        $user->password = $this->password;
        $user->city = $this->city;
        $user->age = $this->age;
        $user->gender = $this->gender;

        if($user->save()){
            return true;
        }else{
            return false;
        }
    }
}