<?php

class PeriodicalCategoryController extends SmcmsController{

    public function indexAction() {
        $this->doact("*");
        $brows = array();
        $getid = SGet('id');
        if($getid > 0){
            $id = $getid;
            $rows = DB::getlist('select * from @pf_periodical_category A where pid=? and id = ? order by sort asc',[0,$id]);
        }else{
            $rows = DB::getlist('select * from @pf_periodical_category A where pid=0 order by sort asc');
        }
        foreach ($rows as $row) {
            $title = $row['title'];
            $row['title'] = '<b>' . $row['title'] . '</b>';
            $row['create'] = 1;
            $brows[] = $row;
            $temp = DB::getlist('select * from @pf_periodical_category where pid=? order by sort asc', array($row['id']));
            foreach ($temp as $rs) {
                $rs['title'] = '+--- <span class="blu">' . $rs['title'] . '</span>';
                $rs['create'] = 1;
                $brows[] = $rs;
                $tempx = DB::getlist('select * from @pf_periodical_category where pid=? order by sort asc', array($rs['id']));
                foreach ($tempx as $rsx) {
                    $rsx['title'] = '+---+--- ' . $rsx['title'];
                    $rsx['create'] = 0;
                    $brows[] = $rsx;
                }
            }
        }
        $this->assign('id',$id);
        $this->assign('rows', $brows);
        $this->displayList();
    }

    public function getCatesAjaxAction() {
        $tbname = "@pf_periodical_category";

        function getdata(&$rows, $tbname) {
            if (count($rows) == 0) {
                return;
            }
            foreach ($rows as &$row) {
                $temp = DB::getopts($tbname, 'id,title', 0, 'pid=?', [$row[0]]);
                if (count($temp) > 0) {
                    $row[2] = $temp;
                    getdata($row[2], $tbname);
                }
            }
        }

        $rows = DB::getopts($tbname, 'id,title', 0, 'pid=0');
        getdata($rows, $tbname);
        return $rows;
    }

}