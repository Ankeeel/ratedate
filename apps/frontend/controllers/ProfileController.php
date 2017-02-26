<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.24.
 * Time: 15:11
 */

namespace Modules\Frontend\Controllers;


use Objects\User;
use Search\UserSearch;

class ProfileController extends ControllerBase
{
    public function indexAction(){
    }

    public function getAction($id=false){
        if($id){
            $userId = $id;
        }
        else {
            $userId = $this->session->get('id');
        }
        $userSearch = UserSearch::createUserSearch();
        $result = $userSearch->create((int)$userId);
        return $this->api(200,$result);
    }

    public function likeAction($id){
        $userSearch = UserSearch::createUserSearch();
        $result = $userSearch->create((int)$id);
        $result->like($this->session->get('id'));
        return $this->api(200,'ok');
    }
}