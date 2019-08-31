<?php
class UserController extends HomeController {

    public function indexAction(){
        $this->doact('*');
        $this->display('index.tpl');
    }

    public function collectAction() {
        $this->islogin();
        $select = new select('@pf_collection_paper cp');
        $select->find('p.title,p.abstract,p.authors,p.id');
        $select->join('@pf_periodical_paper p');
        $select->where('and cp.paper_id=p.id and cp.user_id=?',array($this->userid));
        $select->orderby('cp.id desc');
        $list = $select->getPagelist(10);
        $papers = $list->getlist();
        $bar = $list->getinfo();
        $this->assign(compact('papers','bar'));
        $this->display('collect.tpl');
    }
}