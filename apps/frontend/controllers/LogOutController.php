<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.23.
 * Time: 20:17
 */

namespace Modules\Frontend\Controllers;


class LogOutController extends ControllerBase
{
    public function logOutAction(){
        $this->session->remove("id");
        header("location: /login/index");
    }
}