<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.20.
 * Time: 21:26
 */

namespace Search;


use Models\Users;
use Objects\User;

class UserSearch extends SearchBase
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

    public static function createUserSearch(){
        $userSearch = new UserSearch();
        $userSearch->model = new Users();
        $userSearch->object = new User();
        return $userSearch;
    }

    public function _readSearch(){
        $params=parent::_readSearch();
        if($this->username){
            $params['username']=$this->username;
        }
        if($this->password){
            $params['password']=$this->password;
        }
        if($this->email){
            $params['email']=$this->email;
        }
        if($this->city){
            $params['city']=$this->city;
        }
        if($this->age){
            $params['age']=$this->age;
        }
        if($this->gender){
            $params['gender']=$this->gender;
        }
        if($this->tol){
            $params['tol']=$this->tol;
        }
        if($this->ig){
            $params['ig']=$this->ig;
        }
        if($this->looking){
            $params['looking']=$this->looking;
        }
        return $params;
    }
}