<?php
class JournalController extends Controller {

    public function indexAction(){
        $this->doact('*');
        $cateId = IGet('cid');

        $cates = DB::getlist('select id,title from @pf_periodical_category where pid =0 and allow=1 order by sort');
        foreach ($cates as $k=>$cate) {
            $cates[$k]['childs'] = DB::getlist('select id,title from @pf_periodical_category where pid = ? and allow=1 order by sort',array($cate['id']));
         }
        $dbs =  DB::getlist('select id,name from @pf_database_level');
        $selele = new Select('@pf_periodical');
        $selele->find('*');
        $selele->where('and allow=1');

        if ($cateId>0) {
            $selele->where('and cate like ?',array('%"' . $cateId .'"%'));
        }

        $list = $selele->getPagelist();
        $bar = $list->getinfo();
        $journals = $list->getlist();
        foreach ($journals as $k=>$journal) {
            $journals[$k]['dbs'] = [];
            if (!empty($journal['level_ids']) && $journal['level_ids']!='[]'){
                $arr = json_decode($journal['level_ids']);
                foreach ($arr as $item) {
                    $journals[$k]['dbs'][] = DB::getval('@pf_database_level','alias',$item);
                }
            }
        }
        $this->assign(compact('dbs','cates','bar','journals'));
        $this->display('journal.tpl');
    }

    public function detailAction() {
        $id = IGet('id');
        $this->display('journal.tpl');
    }
}