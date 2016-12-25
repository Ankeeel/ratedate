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
    public $email;
    public function indexAction(){

    }

    public function bekuldAction(){
        $email = $_POST['email'];
        $userSearch = UserSearch::createUserSearch();
        $userSearch->email = $email;
        $register = $userSearch->findFirst();
        if($register){
            echo 'Van ilyen email cím!';
        }
        elseif($_POST['pass'] == $_POST['pass2']){
        $user = $userSearch->create();
        $user->email = $_POST['email'];
        $user->username = $_POST['username'];
        $user->password = $_POST['pass'];
        $user->city = 'standard';
        $user->age = $_POST['age'];
        $user->gender = $_POST['gender'];
        $user->looking = $_POST['looking'];
        $user->school = 'miss';
        $user->job = 'miss';
        $user->weight = 'miss';
        $user->height = 'miss';
        $user->eColor = 'miss';
        $user->hColor = 'miss';
        $user->smoking = 'miss';
        $user->looklike = 'miss';
        $user->hChild = 'miss';
        $user->save();
        $this->response->redirect("login/index");
            }
        else{
            echo'Nem egyezik a két password!';
        }
    }
}