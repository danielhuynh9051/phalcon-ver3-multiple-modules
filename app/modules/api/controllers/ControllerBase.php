<?php
namespace Service\Modules\Api\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function beforeExecuteRoute()
    {
        // Code checklogin
    }

    public function initialize()
    {
        $this->view->disable();
    }
}
