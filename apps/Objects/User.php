<?php

/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.23.
 * Time: 20:30
 */

namespace Objects;

use Models\Users;

class User extends Base
{
    public $id;
    public $email;
    public $username;
    public $password;
    public $city;
    public $age;
    public $gender;
    public $tol;
    public $ig;
    public $looking;
    public $school;
    public $job;
    public $weight;
    public $height;
    public $eColor;
    public $hColor;
    public $smoking;
    public $looklike;
    public $hChild;
    public $ratings;

    public function generate($obj){
        $user = new User();
        $user->id = $obj->id;
        $user->email = $obj->email;
        $user->username = $obj->username;
        $user->password = $obj->password;
        $user->city = $obj->city;
        $user->age = $obj->age;
        $user->gender = $obj->gender;
        $user->tol = $obj->tol;
        $user->ig = $obj->ig;
        $user->school = $obj->school;
        $user->looking = $obj->looking;
        $user->job = $obj->job;
        $user->weight = $obj->weight;
        $user->height = $obj->height;
        $user->eColor = $obj->eColor;
        $user->hColor = $obj->hColor;
        $user->smoking = $obj->smoking;
        $user->looklike = $obj->looklike;
        $user->hChild = $obj->hChild;
        $user->ratings = $obj->ratings;


        return $user;
    }

    public function save(){
        $model = new Users();
        $user = $model->create($this->id);
        $user->email = $this->email;
        $user->username = $this->username;
        $user->password = $this->password;
        $user->city = $this->city;
        $user->age = $this->age;
        $user->gender = $this->gender;
        $user->tol = $this->tol;
        $user->ig = $this->ig;
        $user->school = $this->school;
        $user->looking = $this->looking;
        $user->job = $this->job;
        $user->weight = $this->weight;
        $user->height = $this->height;
        $user->eColor = $this->eColor;
        $user->hColor = $this->hColor;
        $user->smoking = $this->smoking;
        $user->looklike = $this->looklike;
        $user->hChild = $this->hChild;
        $user->ratings = $this->ratings;

        if($user->save()){
            return true;
        }else{
            return false;
        }
    }

    public function like($id){
        if(!in_array($id,$this->ratings)){
            $this->ratings[] = $id;
            $this->save();
        }
    }
}