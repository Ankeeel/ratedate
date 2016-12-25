<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.20.
 * Time: 20:31
 */

namespace Modules\Frontend\Controllers;


use Models\Users;
use Search\UserSearch;

class RegisterController extends ControllerBase
{
    public function indexAction(){

    }

    public function bekuldAction(){
        $userSearch = UserSearch::createUserSearch();
        $user = $userSearch->create();
        $user->username = $_POST['username'];
        $user->password = $_POST['pass'];
        $user->city = 'standard';
        $user->age = 12;
        $user->gender = 'standard';
        $user->save();
        $this->response->redirect("login/index");
    }
}