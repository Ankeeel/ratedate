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
    public $username;
    public $password;

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
        return $params;
    }
}