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
        $form = $this->request->getJsonRawBody();
        $email = !empty($form->email)?$form->email:"";
        $password = !empty($form->password)?$form->password:"";
        $userSearch = UserSearch::createUserSearch();
        $userSearch->email = $email;
        $userSearch->password = $password;
        $login=$userSearch->findFirst();

        if($login){
            $this->session->set("id", $login->id);

            $this->response->redirect("dashboard/index");
            return $this->api(200,json_encode($login));
        }
        else{
            return $this->api(400,json_encode("bazd+"));
        }


    }

    public function logoutAction(){
        $this->session->remove("id");
        return $this->api(200,json_encode("success"));
    }

}