<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.20.
 * Time: 21:07
 */

namespace Modules\Frontend\Controllers;


use Models\Users;
use Search\UserSearch;

class LoginController extends ControllerBase
{
    public function indexAction(){
    }

    public function loginAction(){
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $userSearch = UserSearch::createUserSearch();
        $userSearch->username = $username;
        $userSearch->password = $password;
        $login=$userSearch->findFirst();
        if($login){
            $this->session->set("id", $login->id);

            $this->response->redirect("dashboard/index");
        }
        else{
            echo'nem oké';
        }


    }

}