<?php

class FormNodeController extends SmcmsController{
    
     public function addPostAction() {
        $model = Model($this->ModelName);
        $this->setModel($model);
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        $this->beforeSaveModel($model);

        $node_info = DB::getOne("select 1 from @pf_form_node  where field=? limit 0,1",[$vals['field']]);
        if (!empty($node_info)) {
           $this->error('请保持字段英文名称唯一！');
        }

        DB::insert("@pf_form_node", $vals);
        $this->success('插入数据成功');
    }
    //删除节点的同时也删除sl_form_extend表中的节点
    public function deleteAction() {
        $model = Model($this->ModelName);
        $model->delete($this->id);
        DB::delete("@pf_form_extend","node = ?",[$this->id]);
        $this->success('删除数据成功');
    }
}
