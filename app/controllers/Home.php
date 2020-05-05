<?php

use app\core\Controller;

class Home extends Controller{

    /*
    * chama a view index.php do  /home   ou somente   /
    */
    public function index(){
        $this->view('index');
    }

}
