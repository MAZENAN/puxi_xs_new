<?php

class ClientRecordController extends SmcmsController {

	
    public function addGetAction() {
    	$type=SGet('type');
        $flag = IGet('flag');
        $model = Model($this->ModelName);
        if($type == 3){
            $title='供应商跟进记录';
        }else{
            $title='会员跟进记录';
        }
        $model->title=$title;
        if($type==3){
            $val=8;
        }else{
            $val='7,13';
        }
        $model->Fields['manage_id']->options=DB::getopts('@pf_manage',null,0,"type in($val) and islock = 0");
        if($type==3){
            $header=array('1'=>'负责人');
        }else{
            $header=array('1'=>'课程顾问');
        }
        $model->Fields['manage_id']->header=$header;
        if($type == 3){
            $value=3;
        }else{
            $value=1;
        }
        $model->Fields['type']->value=$value;
        $model->Fields['flag']->value=$flag;
        $this->setModel($model);
        $this->displayModel($model);
    }


    public function editGetAction() {
        $type=SGet('type');
        $model = Model($this->ModelName, Model::MODEL_EDIT);
        $this->setModel($model);
        if($type == 3){
            $title='供应商跟进记录';
        }else{
            $title='会员跟进记录';
        }
        $model->title=$title;
       if($type==3){
            $val=8;
        }else{
            $val='7,13';
        }
        $model->Fields['manage_id']->options=DB::getopts('@pf_manage',null,0,"type in($val) and islock = 0");
        if($type==3){
            $header=array('1'=>'负责人');
        }else{
            $header=array('1'=>'课程顾问');
        }
        $model->Fields['manage_id']->header=$header;
        $model->action = 'edit';
        $row = $model->getone($this->id);
        $model->setFieldVals($row);
        $this->displayModel($model);
    }
    
     public function addPostAction() {
        $model = Model($this->ModelName);
        $model->Fields['flag']->close = FALSE;
        $this->setModel($model);
        $model->autoComplete($xval);
        $id = $xval['client_id'];
        $flag = $xval['flag'];
        $model->Fields['flag']->close = TRUE;
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        $this->beforeSaveModel($model);
        $model->add();
        if($flag==1){
            $this->success('插入数据成功', __APPROOT__ . '/member/edit_camper?id=' . $id,1,0,'
                    window.parent.$("iframe").each(function(){ var url=$(this).attr("src");
                var patt = new RegExp("/admin/client");var patt2 = new RegExp("/admin/member");
                if(patt.test(url)||patt2.test(url)){$(this)[0].contentWindow.location.reload(); window.close();}});
                   ');
        }else{
            $this->success('插入数据成功');
        }
        
    }
}
