<?php
class SearchController extends HomeController {

    public function indexAction(){
        $word = SGet('words');
        if ($word){
            $periodical = DB::getone('select * from @pf_periodical where title like ?',array('%'.$word.'%'));


            $select = new select('@pf_periodical_paper');
            $select->where('and title like ? or content like ? or abstract like ?',array( '%' .$word .'%','%' .$word .'%','%' .$word .'%'));
            $list = $select->getPagelist();
            $bar = $list->getinfo();
            $papers = $list->getlist();
            $this->assign(compact('periodical','papers','bar','word'));
        }else{
            $this->display('index.tpl');return;
        }
        $this->doact('*');
        $this->display('search.tpl');
    }
}