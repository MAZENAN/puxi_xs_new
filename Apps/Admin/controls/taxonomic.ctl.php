<?php

class TaxonomicController extends SmcmsController {

    public function indexAction() {
        $this->doact('*');
        $model = Model($this->ModelName);
        //$rows = MgDB::getList("@pf_{$model->tbname}", ['pid' => 0], null, ['sort' => ['sort' => 1]]);
        $rows = DB::getlist("select * from @pf_{$model->tbname} where pid=? order by sort asc", [0]);
        foreach ($rows as &$row) {
            $row['level'] = 1;
            // $row['count'] = MgDB::find("@pf_{$model->tbname}", ['pid' => $row['_id']])->count();
            $row['count'] = DB::getval("select count(1) as Mycount from  @pf_{$model->tbname} where pid=?", [$row['id']]);
            $this->getLevel($row['id'], $level);
            $row['treename'] = $this->getLevelHtml($row['id'], $row['count'], $level) . '<b>' . $row['name'] . '</b>';
        }
        $this->assign('rows', $rows);
        $this->displayList();
    }

    public function listAction() {
        $idstr = SGet('ids');
        $model = Model($this->ModelName);
        $ids = explode('.', $idstr);
        $grows = [];
        foreach ($ids as $pid) {
            $pid = intval($pid);
            //$rows = MgDB::getList("@pf_{$model->tbname}", ['pid' => $pid], null, ['sort' => ['sort' => 1]]);
            $rows = DB::getlist("select * from @pf_{$model->tbname} where pid=? order by sort asc", [$pid]);
            foreach ($rows as &$row) {
                $level = 1;
                $this->getLevel($row['id'], $level);
                $row['level'] = $level;
                $row['count'] = DB::getval("select count(1) as Mycount from  @pf_{$model->tbname} where pid=?", [$row['id']]);
                // $row['count'] = MgDB::find("@pf_{$model->tbname}", ['pid' => $row['_id']])->count();
                if ($level >= 3) {
                    $row['treename'] = $this->getLevelHtml($row['id'], $row['count'], $level) . '<span class="blu">' . $row['name'] . '</span>';
                } else {
                    $row['treename'] = $this->getLevelHtml($row['id'], $row['count'], $level) . $row['name'];
                }
            }
            $this->assign('rows', $rows);
            
            $out = $this->displayList(NULL, '@taxonomic.tpl', ['output' => false]);
            
            $grows[] = ['id' => $pid, 'code' => $out];
        }
        return $grows;
    }

    public function addPostAction() {
        $model = Model($this->ModelName);
        $this->setModel($model);
        $model->Fields['pid']->default = IReq('pid');
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        DB::insert("@pf_{$model->tbname}", $vals);
        $id = MgDB::lastId();
        $note = $this->getPnote($id);
        $level = count(explode(',', rtrim($note, ',')));
        $vals2 = array('nodepath' => $note, 'level' => $level);
        DB::update("@pf_{$model->tbname}", $vals2, $id);
        $this->success('插入数据成功');
    }

    public function editPostAction() {
        $model = Model($this->ModelName, Model::MODEL_EDIT);
        $this->setModel($model);
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $model->action = 'edit';
            $this->displayModel($model);
            return;
        }
        $this->beforeSaveModel($model);
        $vals['nodepath'] = $this->getPnote($this->id);
        $level = count(explode(',', rtrim($vals['nodepath'], ',')));
        $vals['level'] = $level;
        DB::update("@pf_{$model->tbname}", $vals, $this->id);
        $this->success('编辑数据成功');
    }

    //获得父节点ID
    protected function getPnote($id, &$note = '') {
        $model = Model($this->ModelName);
        // $row = MgDB::getOne("@pf_{$model->tbname}", $id, ['pid']);
        $row = DB::getone("select pid from @pf_{$model->tbname} where id=?", [$id]);
        if ($row != null) {
            if ($row['pid'] != 0) {
                $note = $row['pid'] . ',' . $note;
                $this->getPnote($row['pid'], $note);
            }
        }
        return $note . $id . ',';
    }

    protected function getLevel($id, &$level = 1) {
        $model = Model($this->ModelName);
        //  $row = MgDB::getOne("@pf_{$model->tbname}", $id, ['nodepath']);
        $row = DB::getone("select nodepath from @pf_{$model->tbname} where id=?", [$id]);
        if ($row != null) {
            $level = count(explode(',', trim($row['nodepath'], ',')));
        }
        return;
    }

    protected function getLevelHtml($id, $count, $level) {
        $html = '';
        for ($i = 1; $i <= $level; $i++) {
            if ($count > 0) {
                if ($i == $level) {
                    $html.='<span class="dashed_vvline"><img pid="' . $id . '" src="' . __RES__ . '/images/show.png" hide="' . __RES__ . '/images/hide.png" show="' . __RES__ . '/images/show.png" /></span>';
                } else {
                    $html.='<span class="dashed_vline"></span>';
                }
            } else {
                if ($level == $i) {
                    $html.='<span class="dashed_vvline"></span>';
                } else {
                    $html.='<span class="dashed_vline"></span>';
                }
            }
        }
        return $html;
    }

    public function getdataAction() {
        $model = Model($this->ModelName);
        $tbname = "@pf_{$model->tbname}";
        function getdata(&$rows, $tbname) {
            if (count($rows) == 0) {
                return;
            }
            foreach ($rows as &$row) {
                $temp = DB::getopts($tbname, 'id,name', 0, 'pid=?', [$row[0]]);
                if (count($temp) > 0) {
                    $row[2] = $temp;
                    getdata($row[2], $tbname);
                }
            }
        }
        $rows = DB::getopts($tbname, 'id,name', 0, 'pid=0');
        getdata($rows, $tbname);
        return $rows;
    }

}
