<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.25.
 * Time: 1:17
 */

namespace Modules\Frontend\Controllers;


use Search\UserSearch;

class SettingsController extends ControllerBase
{
    public function indexAction(){

    }

    public function saveAction(){
        $id = $this->session->get('id');
        $userSearch = UserSearch::createUserSearch();
        $perSetting = $userSearch->create($id);
        $perSetting->age = $_POST['age'];
        $perSetting->city = $_POST['city'];
        $perSetting->save();
        $this->response->redirect("profile/index");
    }
}