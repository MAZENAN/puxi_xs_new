<?php
class JournalController extends HomeController {

    public function indexAction(){
        $this->doact('*');
        $cateId = IGet('cid');
        $dblevel = IGet('dblevel');
        $journalKey =SGet('journal_key');

        $cates = DB::getlist('select id,title from @pf_periodical_category where pid =0 and allow=1 order by sort');
        foreach ($cates as $k=>$cate) {
            $cates[$k]['childs'] = DB::getlist('select id,title from @pf_periodical_category where pid = ? and allow=1 order by sort',array($cate['id']));
         }
        $dbs =  DB::getlist('select id,name from @pf_database_level');
        foreach ($dbs as $k=>$db) {
            if (!$cateId){
                $countRow = DB::getone('select count(*) as num from @pf_periodical where level_ids like ?',array('%"' .$db['id'] . '"%'));
            }else{
                $countRow = DB::getone('select count(*) as num from @pf_periodical where level_ids like ? and cate like ?',
                    array('%"' .$db['id'] . '"%','%"' .$cateId . '"%'));
            }


            $dbs[$k]['count'] = $countRow['num'];
        }
        $selele = new Select('@pf_periodical');
        $selele->find('*');
        $selele->where('and allow=1');

        if ($cateId>0) {
            $selele->where('and cate like ?',array('%"' . $cateId .'"%'));
        }
        if ($dblevel>0){
            $selele->where('and level_ids like ?',array('%"' . $dblevel .'"%'));
        }

        if ($journalKey) {
            $issnpat = '#^[0-9]{4}[\s-\*]{1}[0-9]{4}$#';
            $cnpat = '#^[0-9]{2}[\s-\*]{1}[0-9]{4}/[a-z0-9]{1,2}$#i';
            if (preg_match($issnpat, $journalKey)) {
                $selele->where('and issn = ?',array($journalKey));
            } else if (preg_match($cnpat, $journalKey)) {
                $selele->where('and cn = ?',array($journalKey));
            } else {
                $selele->where('and title = ?',array($journalKey));
            }
            $this->assign('journalKey',$journalKey);
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
        $pos = '全部';
        if ($cateId) {
            $cateInfo = DB::getone('select title,pid from @pf_periodical_category where id=?',array($cateId));
            if ($cateInfo) {
                if ($cateInfo['pid']==0){
                    $pos = $cateInfo['title'] . '>全部';
                }else {
                   $parCateInfo = DB::getone('select title from @pf_periodical_category where id=?',array($cateInfo['pid']));
                   $pos = $parCateInfo['title'] . '>' . $cateInfo['title'];
                }
            }
        }
        $this->assign(compact('dbs','cates','bar','journals','pos'));
        $this->display('journal.tpl');
    }

    public function detailAction() {
        $id = IGet('id');
        $journal = DB::getone('select * from @pf_periodical where id=?',array($id));
        $papers =  DB::getlist('select id,title,authors from @pf_periodical_paper where periodical_id =? and is_classic=1 and allow=1',array($id));

        $phases =  DB::getlist('select year,phase from @pf_document where periodical_id=? order by year desc ,phase asc',array($id));
        $phaseArr = [];
        foreach ($phases as $phase) {
            $phaseArr[$phase['year']][] = $phase['phase'];
        }
        $this->assign(compact('journal','papers','phaseArr'));
        $this->display('journal_detail.tpl');
    }
}