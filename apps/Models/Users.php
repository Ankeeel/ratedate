<?php

namespace Models;

use Objects\Seq;

class Users extends \Phalcon\Mvc\Collection
{
    public $id;
    public $username;
    public $password;
    public $city;
    public $age;
    public $gender;


    public function create($id = false){
        if($id){
            $found = Users::findFirst(array("conditions" => array(
                'id' => $id
            )));
            return $found;
        }

        $seq = Seq::createSeq('Users');
        $Users = new Users();
        $Users->id = $seq->current;
        $Users->save();
        return $Users;
    }
}