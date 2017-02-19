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

    public function getAction(){
        $sess = $this->session->get('id');
        $userSearch = UserSearch::createUserSearch();
        $result = $userSearch->create($sess);
        return $this->api(200,$result);
    }
}