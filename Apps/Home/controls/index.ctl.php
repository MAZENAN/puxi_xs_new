<?php
class IndexController extends Controller {

    public function indexAction(){
        $this->doact('*');
        $this->display('index.tpl');
    }
}