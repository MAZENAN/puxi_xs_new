<?php
class IndexController extends HomeController {

    public function indexAction(){
        $this->doact('*');
        $this->display('index.tpl');
    }
}