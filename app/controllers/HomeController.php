<?php

use app\core\Controller;

class HomeController extends Controller{

    /*
    * chama a view index.php do  /home   ou somente   /
    */
    public function index(){
        $this->view('index');
    }

}
