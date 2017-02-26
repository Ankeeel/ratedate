<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.23.
 * Time: 19:18
 */

namespace Modules\Frontend\Controllers;


use Search\UserSearch;

class DashboardController extends ControllerBase
{
    public function indexAction(){
    }

    public function searchAction(){
        $form = $this->request->getJsonRawBody();
        $sess = $this->session->get('id');
        $userSearch = UserSearch::createUserSearch();
        $userSearch->excludedIds = array($sess);
        $userSearch->username = $form->username;
        $results = $userSearch->find();
        return $this->api(200,$results);
    }
}