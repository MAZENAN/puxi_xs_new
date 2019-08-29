<?php
class FormController extends SmcmsController{
    /**
     * 新增报名表列表
     */
    public function formAddAction(){
        $model = new FormModel(Model::MODEL_ADD);//1为编辑，0为添加
        $this->setModel($model);
        $this->assign('type','add');
        $this->displayModel($model,'layout/form_add_list.tpl');
    }
     /**
     * 添加项列表
     */
     public function nodeGetAction() {
        $id=SGet('id');
        $extend_one_info=DB::getlist("select node from @pf_form_extend where `group`=? order by sort",[$id]);
        $selected_node=array();//已经选择过的变成不可选
        if(!empty($extend_one_info)){
            foreach ($extend_one_info as  $value) {
                $selected_node[] = $value['node'];
            }
        }
        $node_info = DB::getlist("select * from @pf_form_node  order by belong asc,pid asc,sort asc");
        $rows=array();
        $names=array();
        //var_dump($selected_node);die();
        foreach($node_info as $value){ 
            foreach ($node_info as $val){
                if($value['pid'] == 0 ){
                    $name = $value['name'];
                }
                if($value['id'] == $val['pid']){
                    $val['node']=$selected_node;
                   $rows[$value['belong']][$name][]=$val;              

               }                    


            }
        }//var_dump($rows);die();
        $this->assign("rows", $rows);
        $this->display("layout/form_select_node_list.tpl");
    }
    public function formPostAction() {
        $info=array();
        $info['title'] = $_POST['title'];
        $info['img'] = $_POST['img'];
        $info['info'] = $_POST['info'];
        $info['add_time'] = date('Y-m-d H:i:s');
        $url = '/form';
        if($_POST['type'] == 'edit'){
            DB::update('@pf_form_base',$info,$_POST['base_id']);
            $group = $_POST['base_id'];//form_base的ID值
            $show = "报名表修改成功";
            $url='/form/form_edit?id='.$group;
        }else{
            DB::insert('@pf_form_base',$info);
            $group = DB::lastId();
            $show = "报名表添加成功";
        }
        
        $val = array();
        for ($i=0; $i<count($_POST['id']); $i++) {
            $val['group'] = $group;
            $val['node'] = $_POST['id'][$i];
            $val['sort'] =$_POST['sort'][$i];
            $val['required'] = 0;
            if(!empty($_POST['required']) ){//$_POST['required']为选中不为空的值 ，$_POST['req']是默认不为空的值
                if(in_array($val['node'],$_POST['required']) ){//选中不能为空的值
                    $val['required'] = 1;
                }
            }
            if(!empty($_POST['node_id'])){
                if(in_array($val['node'],$_POST['node_id'])){//form_node表不能为空的值
                    $val['required'] = 1;
                }
            }
            DB::insert('@pf_form_extend',$val);
            
        }
        
         $this->success($show,__APPROOT__.$url);
        
    }


    public function form_editAction(){
        $model = new FormModel(Model::MODEL_EDIT);//1为编辑，0为添加
        $id=SGet('id');
        $base_one_info = DB::getrow('@pf_form_base',$id);//var_dump($row);die();
        $extend_join_node_info = DB::getlist("select extend.id as extend_id,node.id,node.pid,node.required as req,extend.required,node.name,extend.sort from @pf_form_extend as extend join @pf_form_node as node  on  extend.node=node.id where extend.group=? order by extend.sort asc",[$id]);
        $this->assign('base_id',$id);
        $model->setFieldVals($base_one_info);
        $type = SGet('type');
        if($type == '1'){
            $this->assign('type','edit');
            $this->displayModel($model,'layout/form_add_list.tpl');
            return;
        }
        $model->Fields['title']->offedit = true;
        $model->Fields['img']->offedit = true;
        $model->Fields['info']->offedit = true;
        $rows=array();
        foreach($extend_join_node_info as $val){
            if($val['pid'] != 0){
                $rows[] = $val;
            }
        }
        $this->assign('rows',$rows);
        $this->displayModel($model,'layout/form_single_list.tpl');
    }
    /**
     * 
     * @author yaoshaoqing
     * 修改是否必填项
     */
    public function clickAction(){
        $val = SGet('required');
        $id = SGet('id');
        DB::update("@pf_form_extend", ['required'=>$val],$id);
        $this->success();
    }
    //删除报名表
    public function deleteAction() {
        $model = new FormModel(Model::MODEL_EDIT);//1为编辑，0为添加
        $model->delete($this->id);
        DB::delete("@pf_form_extend",'where `group`=? ',[$this->id]);//删除扩展表中的信息
        
        //将删除的报名表id 所对应的camp表中base_id置于0
        $camp = DB::getlist("SELECT * FROM @pf_camp where base_id=?",[$this->id]);
        if(is_array($camp)){
            foreach ($camp as $value) {
                DB::update("@pf_camp", array("base_id"=>0), "id=?", [$value['id']]);
            }
        }
       
        $this->success('删除数据成功');
    }
    //删除报名表当中的一个节点
    public function delete_extendAction(){
        $id=SGet('id');
        DB::delete('@pf_form_extend','where `id`=? ',[$id]);
        $this->success('删除数据成功'); 
    }

    //下移
     public function upsortAction() {
        $model = new FormExtendModel(Model::MODEL_EDIT);//1为编辑，0为添加
        //DB::update('@pf_',['click' => DB::sql('ifnull(click,0)+1')], $id);
        $model->upsort($this->id);
        $this->success();
    }
    //上移
    public function dnsortAction() {
        $model = new FormExtendModel(Model::MODEL_EDIT);//1为编辑，0为添加
        $model->dnsort($this->id);
        $this->success();
    }
    //修改
     public function editsortAction() {
        $id = IPost('extend_id');
        $sort = empty($_REQUEST['sort']) ? 0 : intval($_REQUEST['sort']);
        if ($sort == 0) {
            $this->alert('数据提交有误!');
        }
        DB::update("@pf_form_extend",['sort'=>$sort],$id);
        $this->success();
    }
    
         public function getFieldAction($model,$field,$i){
            $key=$field['field'].$i;
            $model->Fields[$field['field'].$i]= new  ModelField();
            $model->Fields[$key]->label = $field['name'];
            $model->Fields[$key]->label_width = 150;
            $model->Fields[$key]->type = $field['type'];
            if($field['type'] == "radiogroup"||$field['type'] == "checkgroup"){
                $radio = explode("|",$field['values']);
                $arr=array();
                foreach ($radio  as $key=>$value){
                    $arr[]=array(
                        0=>$key,
                        1=>$value,
                    );
                };
                $model->Fields[$field['field'].$i]->options = $arr;
                $model->Fields[$field['field'].$i]->default = '0';
            }
                        
            if($field['required'] == 1 || $field['req'] == 1){
                $model->Fields[$field['field'].$i]->data_val = array("required" => true);
                $model->Fields[$field['field'].$i]->data_val_msg = array("required" => "当前栏不能为空");
                $model->Fields[$field['field'].$i]->data_valmsg_for = "#".$key."_info";
            } 
            if($field['type'] == "linkage"){
                $model->Fields[$key]->type = "linkage";
                $model->Fields[$key]->headers = array(0=>'选择城市',1=>"选择城市");
                $model->Fields[$key]->data_url = '/service/area.php';
            }
            if($field['type'] == "select"){
                $model->Fields[$key]->type = "select";
                $model->Fields[$key]->options = DB::getopts('@pf_nationality');
                $model->Fields[$key]->valtype = 'int';
            }

    }
    
    /**
     * @author ysq
     * 报名表预览
     */
    public function previewAction(){
        $model = new ApplicationModel(Model::MODEL_ADD);
        $id = SGet('id');

        $node_info = DB::getlist("select node.*,extends.required as req from @pf_form_base as base join @pf_form_extend as extends on base.id = extends.group join @pf_form_node as node on extends.node = node.id where node.pid <> ? and extends.group = ? order by extends.sort asc",[0,$id]);
      
        foreach($node_info as $val){
            if($val['belong'] == 1){
                $field1[]=$val;
                //获取字段名
                if ($val['field']=='p_name') {
                        $field_value='c_name';
                    }elseif ($val['field']=='p_gender') {
                        $field_value='c_gender';
                    }elseif ($val['field']=='p_IDcard') {
                        $field_value='IDcard';
                    }elseif ($val['field']=='p_passportNo') {
                        $field_value='passportNo';
                    }elseif ($val['field']=='p_Nationality') {
                        $field_value='Nationality';
                    }elseif ($val['field']=='p_valid_date') {
                        $field_value='valid_date';
                    }else{
                        $field_value=$val['field'];
                    }
                
            }
            elseif($val['belong'] == 0){
                    $field0[]=$val;
                    $field_name = $val['field'];

            }
            elseif($val['belong'] == 2){
               $field2[] = $val;
            }

        }
        $rows0 = array();
        $rows1 = array();
        $rows2 = array(); 
        for($i=0;$i<1;$i++){//根据订单的子女人数向前台展示
            for ($j=0; $j < count($field0) ; $j++) { 
                $tourist=$field0[$j];
                $this->getFieldAction($model,$tourist,$i);
                $c=array();
                $c['field']=$tourist['field'].$i;
                $c['type']=$tourist['type'];
                $c['name']=$tourist['name'];
                $rows0[]=$c;
            }
            
        }
        
        for($i=0;$i<1;$i++){//根据订单的子女人数向前台展示
            for ($j=0; $j < count($field1) ; $j++) { 
                $parent=$field1[$j];
                $this->getFieldAction($model,$parent,$i);
                $c=array();
                $c['field']=$parent['field'].$i;
                $c['type']=$parent['type'];
                $c['name']=$parent['name'];
                $rows1[]=$c;
            }
        }
        for ($j=0; $j < count($field2) ; $j++) { 
                $other=$field2[$j];
                $this->getFieldAction($model,$other,'');
                $c=array();
                $c['field']=$other['field'];
                $c['type']=$other['type'];
                $c['name']=$other['name'];
                $rows2[]=$c;
        }
       
        //报名表表头信息
        $form_info = DB::getone("select title,img,info from @pf_form_base where id =?",[$id]);
        $this->assign("form_info",$form_info);
        $this->assign("orderid",$orderid);
        $this->assign('base_id',$base_id);
        $this->assign("user_id",$user_id);
      
        $this->assign('rows0',$rows0);
        $this->assign('rows1',$rows1);
        $this->assign('rows2',$rows2);
       
        $this->displayModel($model,"layout/preview_list.tpl");

    }
    
   
}
