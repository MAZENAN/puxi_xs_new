<?php

 class TopicController extends SmcmsController {

    public function listData($select) {
        $select->orderby(" sort desc,id asc");
        $config = DB::getone("select * from @pf_config where id=1 ");
        $this->assign('url',$this->exchangeHost());
        $this->assign('sentence',$config['home_sentence']);
        return parent::listData($select);
    }

    /**
     * 首页一句话保存
     */
    public function saveAction() {
        $home_sentence = SGet('sentence');
        DB::update('@pf_config',array('home_sentence'=>$home_sentence),1 );
        $this->success('数据保存成功');
    }

//上架
    public function seton_allowAction() {
        $id = IGet('id');
        $data = array('uptime'=>  date('Y-m-d H:i:m'),'allow'=>1);
        DB::update('@pf_topic', $data,$id);
        $this->success();
    }
//下架 
    public function setoff_allowAction() {
        $id = IGet('id');
        $data = array('allow'=>0);
        DB::update('@pf_topic', $data,$id);
        $this->success();
    }
    
    /**
     * 专题分类列表
     */
    public function categoryAction() {
        $id = IGet('id'); //获取专题id
        //分类
        $select = new Select('@pf_topic_category');
        $select->find('*');
        $select->where(" and topic_id=?",[$id]);
        $select->orderby('sort desc,id asc');
        $list = $select->getPagelist(20);
        $category = $list->getlist();
        
        foreach ($category as $key => $value) {
            //得到产品的id及标题
            $camp = DB::getlist("select c.id,c.title from @pf_topic_camp tc LEFT JOIN @pf_camp c on tc.camp_id = c.id where category_id=? and topic_id=? order by tc.sort asc", [$value['id'],$id]);
            $category[$key]['camp'] = $camp;
        }
        $this->assign('id',$id);
        $this->assign('bar', $list->getinfo());
        $this->assign('rows', $category);
        $this->display('layout/topic_category_list.tpl');
        
    }
    
    /**
     * 新增分类产品
     */
    public function camp_addAction() {
        $model = new TopicCategoryModel(Model::MODEL_ADD);
        $id = IGet('id');//专题id
        $this->assign('id',$id);
        //判断是否是从编辑页跳转过来的
        $this->assign('edit',  SGet('edit'));
        $this->displayModel($model,'topic_camp.tpl');

    }
      /**
     * 新增分类产品
     */
    public function save_addAction() {
        $model = new TopicCategoryModel(Model::MODEL_ADD);
        
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
            $xval['category'] = $vals['category'];
            $xval['sort'] = $vals['sort'];
            $xval['topic_id'] = $vals['topic_id'];
            $xval['img'] = $_POST['img'];
            $xval['img_url'] = $_POST['img_url'];
            DB::insert('@pf_topic_category', $xval);
            $lastid = DB::lastId();
            $campids = explode(",",$vals['camp_id']);
            $campids = array_unique($campids);//去掉重复的产品id
            foreach($campids as $key=>$value){
                if(!empty($value)){
                    $data['camp_id'] = $value;
                     $data['category_id'] = $lastid;
                     $data['topic_id'] = $vals['topic_id'];
                     $data['sort'] = $key;
                     DB::insert('@pf_topic_camp', $data);
                }
                 
             }
             //判断是否是从编辑页跳转过来的
        if ($_POST['edit'] == 'edit') {
            $this->success('插入数据成功', __SELF__ . '/edit?id=' . $vals['topic_id'],1,0,'
                   
                    window.parent.$("iframe").each(function(){
                        var url=$(this).attr("src");
                        var patt=new RegExp("/admin/topic");
                        if(patt.test(url)){
                            $(this)[0].contentWindow.location.reload();
                            window.close(); 
                        }
                    });                                        
                 ');
        } else {
            $this->success('插入数据成功', __SELF__ . '/category?id=' . $vals['topic_id']);
        }
    }

    /**
     * 修改分类产品
     */
    public function camp_editAction() {
        $model = new TopicCategoryModel(Model::MODEL_EDIT);
        $action = 'edit';
        $category_id = IGet('cid');
        $row = DB::getone("select * from @pf_topic_category where id=?",[$category_id]);
        $camp = DB::getlist("select c.id,c.title from @pf_topic_camp tc left join @pf_camp c on tc.camp_id=c.id where category_id=? order by tc.sort", [$category_id]);
        //判断是否是从编辑页跳转过来的
        $this->assign('edit',  SGet('edit'));
        $this->assign('action',$action);
        $this->assign('id',$row['topic_id']);
        $this->assign('row',$row);
        $this->assign('camps',$camp);
        $this->displayModel($model,'topic_camp.tpl');
    }
    
    public function save_editAction() {
         $model = new TopicCategoryModel(Model::MODEL_EDIT);
        
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        
            $cid = $vals['cid'];
            $xval['category'] = $vals['category'];
            $xval['sort'] = $vals['sort'];
             $xval['img'] = $_POST['img'];
            $xval['img_url'] = $_POST['img_url'];
            DB::update("@pf_topic_category", $xval,$cid);
            //删除原有的产品
            DB::delete("@pf_topic_camp", " category_id=?",[$cid]);
             $campids = explode(",",$vals['camp_id']);
             $campids = array_unique($campids);
          
            foreach($campids as $key=>$value){
                if(!empty($value)){
                    $data['camp_id'] = $value;
                     $data['category_id'] = $cid;
                     $data['topic_id'] = $vals['topic_id'];
                     $data['sort'] = $key;
                     DB::insert('@pf_topic_camp', $data);
                }                
             }
             //判断是否是从编辑页跳转过来的
            if ($_POST['edit'] == 'edit') {
                $this->success('插入数据成功', __SELF__ . '/edit?id=' . $vals['topic_id'],1,0,'
                   window.parent.$("iframe").each(function(){
                    var url=$(this).attr("src");
                    var patt=new RegExp("/admin/topic");
                    if(patt.test(url)){
                        $(this)[0].contentWindow.location.reload();
                        window.close();
                    }
                   });
                                       
                   ');
            } else {
                $this->success('插入数据成功', __SELF__ . '/category?id=' . $vals['topic_id'],0,0,'<script type="text/javascript">$(function () {window.close();});</script>');
            }
             //$this->success('编辑数据成功',__SELF__.'/category?id='.$vals['topic_id']);
        
    }

    /**
    *删除分类
    */
    public function camp_deleteAction(){
        $cid = IGet('id');
        DB::delete('@pf_topic_category',$cid);
        DB::delete('@pf_topic_camp','category_id=?',[$cid]);
        $this->success('删除数据成功');
    }
    
    /**
     * ajax 查找产品
     */
    public function searchAjaxAction() {
        $title = SPost('content');
        
        $camp = DB::getlist("select * from @pf_camp where title like ? order by id",["%".$title."%"]);
        
        return $camp;
        
    }
    /**
     * @ author ysq
     */
    public function addGetAction() {
        $model = Model($this->ModelName);
        $model->title = "新增专题";
        $this->setModel($model);
        $this->displayModel($model);
    }
    /**
     * @ author ysq
     * @ 添加专题
     */
     public function addPostAction() {
        $model = Model($this->ModelName);
        $this->setModel($model);
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        for($i=1;$i<=5;$i++){
            if($vals['related_topic_'.$i]){
                $val['related_topic_'.$i] = $vals['related_topic_'.$i];   
            }
            unset($vals['related_topic_'.$i]);
        }
        if(json_encode($val)!='null' ){
            $vals['related_topic'] = json_encode($val);
        }
        $this->beforeSaveModel($model);
        DB::insert('@pf_topic',$vals);
        $topic_id = DB::lastId();
        $this->success('新增专题成功，请继续添加分类', __SELF__.'/edit?id='.$topic_id);
    }
    /**
     * 
     * @ author ysq
     * @ 编辑专题
     */
    public function editPostAction() {
        $model = Model($this->ModelName, Model::MODEL_EDIT);
        $this->setModel($model);
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $model->action = 'edit';
            $this->displayModel($model);
            return;
        }
        for($i=1;$i<=5;$i++){
            if($vals['related_topic_'.$i]){
                $val['related_topic_'.$i] = $vals['related_topic_'.$i];   
            }
            unset($vals['related_topic_'.$i]);
        }
       if(json_encode($val)!='null'){
            $vals['related_topic'] = json_encode($val);
        }else{
            $vals['related_topic'] = '';
        }
        $this->beforeSaveModel($model);
        DB::update('@pf_topic',$vals,$this->id);
        $this->success('编辑数据成功',__SELF__);
    }
    
    /**
     * @ author ysq
     * @ 编辑列表
     */
     public function editGetAction() {
        $model = Model($this->ModelName, Model::MODEL_EDIT);
        $model->title = "编辑专题";
        $this->setModel($model);
        $model->action = 'edit';
        $row = $model->getone($this->id);
        $topic_categroy_info = DB::getlist('select category.id,category.category,camps.title '
                . 'from @pf_topic_category as category '
                . 'left join @pf_topic_camp as camp on category.id = camp.category_id '
                . 'left join @pf_camp as camps on camp.camp_id = camps.id '
                . 'where category.topic_id = ?',[$this->id]);
        foreach($topic_categroy_info as $key => $val){
            $rows[$val['id']]['id'] = $val['id'];
            //$rows[$val['id']]['topic_id'] = $val['topic_id'];
            $rows[$val['id']]['category'] = $val['category'];
            $rows[$val['id']]['title'][] = $val['title'];
        }
        $model->setFieldVals($row);
        if(!empty($row['related_topic']) && $row['related_topic']!='null'){
            $json_decode = json_decode($row['related_topic'],true);
            if(is_array($json_decode)){
                $arr = array_filter($json_decode);
                foreach($arr as $key => $val){
                    $model->Fields[$key]->value=$val;
                }
            }
        }
        $this->assign('topic_id',$this->id);
        $this->assign('rows',$rows);
        $this->displayModel($model,'layout/topic_edit_list.tpl');
    }
}