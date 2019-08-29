<?php
/**
 * @author ysq
 */
class ComplaintController extends SmcmsController{
    
    public function listData($select){
        
        $select->find('@pf_complaint.*,o.id as oid ,o.title,o.ct1_name,o.ct1_phone');
        $select->leftJoinMore('@pf_order as o','@pf_complaint.order_id = o.id');
        if(preg_match("/^[0-1]+$/",$this->sch['state'])){
            $select->where('and @pf_complaint.state = ?',[$this->sch['state']]);
        }
        if($this->sch['title']){
            $select->like_search('and o.title like ?',$this->sch['title']);
        }
        return parent::listData($select);
    }
    public function editGetAction(){
         $model = Model($this->ModelName, Model::MODEL_EDIT);
        $this->setModel($model);
        $model->action = 'edit';
        $row = $model->getone($this->id);
        //$info = DB::getone('select title from @pf_order where orderid =?',[$row['order_id']]);
        
        //$model->Fields['title']->default=$info['title'];
        $model->setFieldVals($row);
        $this->displayModel($model);
    }
    
    public function editPostAction() {
        $model = Model($this->ModelName);
        $this->setModel($model);
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        $this->beforeSaveModel($model);
        $info = array(
            'state'=>1,
            'content'=>$vals['content'],
            'manage_id'=>$vals['manage_id'],
            'edit_time'=>date('Y-m-d H:i:s'),
            );
       DB::update('@pf_complaint',$info ,$this->id);
       $this->success('提交成功',NULL,1,0, 
               'window.parent.$("iframe").each(function(){
                        var url=$(this).attr("src");
                        var patt=new RegExp("/admin/complaint");
                        if(patt.test(url)){
                            $(this)[0].contentWindow.location.reload();
                            window.close(); 
                        }
                    });');
    }
    
    public function showGetAction() {
        $model = new ComplaintModel( Model::MODEL_EDIT);//Model(, Model::MODEL_EDIT);
        $this->setModel($model);
        $row = $model->getone($this->id);
        $model->setFieldVals($row);
        $model->Fields['parm']= new  ModelField();
        $model->Fields['parm']->row_hide = true;
        $model->Fields['parm']->default = 1;
        $model->Fields['content']->offedit = true;
        $model->Fields['manage_id']->options =  DB::getopts('@pf_manage',null,0,"type in(7,13) and islock = 0 and id=?",[$row['manage_id']]);
        $this->displayModel($model);
    }
}