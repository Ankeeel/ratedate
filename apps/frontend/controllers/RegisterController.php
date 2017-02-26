<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.20.
 * Time: 20:31
 */

namespace Modules\Frontend\Controllers;


use Objects\User;
use Search\UserSearch;

class RegisterController extends ControllerBase
{
    public $email;
    public function indexAction(){
    }

    public function sendAction(){
        $form = $this->request->getJsonRawBody();
        $search = UserSearch::createUserSearch();
        /** @var User $user */
        $user = $search->create();
        $user->username = $form->username;
        $user->password = $form->password;
        $user->email = $form->email;
        $user->age = $form->age;
        $user->gender = $form->gender;
        $user->save();
        return $this->api(200,json_encode('ok'));
    }
}