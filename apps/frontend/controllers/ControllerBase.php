<?php

namespace Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Search\UserSearch;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->checkLogin();
    }

    public function checkLogin()
    {
        if ($this->session->has('id')) {
            $this->view->setMainView('index');
        } else {
            if ($this->router->getControllerName() == 'register') {
                $this->view->setMainView('register');
            } else {
                $this->view->setMainView('login');
            }

        }
    }
        protected function api($code, $data)
        {

            $this->response->setStatusCode($code);
            $this->response->setContentType("application/json; charset=UTF-8");
            $this->response->setContent(json_encode($data));

            return $this->response;

        }
}
