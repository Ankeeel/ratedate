<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2017.02.19.
 * Time: 20:40
 */

namespace Modules\Frontend\Controllers;


use Search\UserSearch;

class OptionController extends ControllerBase
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