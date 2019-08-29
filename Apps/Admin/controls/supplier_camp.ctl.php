<?php

 class SupplierCampController extends SmcmsController {

    public function addGetAction() {
        $type=SGet('type');
        $model = new SupplierCampModel(Model::MODEL_ADD);
        $model->Fields['type']->value = $type;
        if($type == '0'){
            $model->title='预上架-国内营';
            $model->Fields['theme']->close = false;//国内项目主题显示
            $model->Fields['camp_category']->close = true;//国际项目主题隐藏
            $model->Fields['camp_country']->close = true;//国际目的地隐藏
            $model->Fields['boarding']->close = true;//国际项目类型隐藏
            $model->Fields['destination']->data_val = ['required'=>true];//国内目的地不能为空
            $model->Fields['destination']->data_val_msg = ['required'=>'请选择目的地'];//项目主题不能为空
            $model->Fields['theme']->data_val = ['required'=>true];//项目主题不能为空
            $model->Fields['theme']->data_val_msg = ['required'=>'请选择项目主题'];//项目主题不能为空

        }elseif($type == '1'){
            $model->title='预上架-国际营';
            $model->Fields['destination']->close = true;//国内目的地隐藏
            $model->Fields['camp_category']->close = false;//国际项目主题显示
            $model->Fields['camp_category']->data_val = ['required'=>true];//国际项目主题不能为空
            $model->Fields['theme']->close = true;//国内项目主题隐藏
            $model->Fields['camp_country']->close = false;//国际目的地显示
            $model->Fields['boarding']->close = false;//国际项目类型显示
            $model->Fields['boarding']->data_val = ['required'=>true];//项目类型不能为空
            $model->Fields['boarding']->data_val_msg = ['required'=>'请选择项目类型'];//项目主题不能为空
            $model->Fields['camp_country']->data_val = ['required'=>true];//国际目的地不能为空
            $model->Fields['camp_country']->data_val_msg = ['required'=>'请选择目的地'];//项目主题不能为空
            $model->Fields['camp_category']->data_val = ['required'=>true];//项目主题不能为空
            $model->Fields['camp_category']->data_val_msg = ['required'=>'请选择项目主题'];//项目主题不能为空
        }
        $this->setModel($model);
        $this->displayModel($model);
    }
    //
    public function addPostAction() {
        $model = new SupplierCampModel(Model::MODEL_ADD);
        $this->setModel($model);
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        $vals['addtime']=date('Y-m-d H:i:s');
        $vals['allow'] = 2;
        $xval['fate_min']  = $vals['fate_min'];
        $xval['fate_max']  = $vals['fate_max'];
        $xval['price_min'] = $vals['price_min'];
        $xval['price_max'] = $vals['price_max'];
        $xval['remark']    = $vals['remark'];
        unset($vals['remark']);
        unset($vals['fate_min']);
        unset($vals['fate_max']);
        unset($vals['price_min']);
        unset($vals['price_max']);
        $ret = DB::insert("@pf_{$model->tbname}", $vals);
        $xval['campid'] = DB::lastId();
        $data = DB::insert("@pf_camp_extend", $xval);
        $this->success('插入数据成功');
    }
      //编辑
      public function editGetAction() {
        $model = new SupplierCampModel(Model::MODEL_EDIT);
        $row = $model->getone($this->id);
        $data = DB::getone('select * from @pf_camp_extend where campid=?',[$this->id]);
        $model->Fields['fate_min']->value = $data['fate_min'];
        $model->Fields['fate_max']->value = $data['fate_max'];
        $model->Fields['price_min']->value = $data['price_min'];
        $model->Fields['price_max']->value = $data['price_max'];
        $model->Fields['remark']->value = $data['remark'];
        if($row['type'] == '0'){
            $model->title='预上架-国内营';
            $model->Fields['theme']->close = false;//国内项目主题显示
            $model->Fields['camp_category']->close = true;//国际项目主题隐藏
            $model->Fields['camp_country']->close = true;//国际目的地隐藏
            $model->Fields['boarding']->close = true;//国际项目类型隐藏
            $model->Fields['destination']->data_val = ['required'=>true];//国内目的地不能为空
        }elseif($row['type'] == '1'){
            $model->title='预上架-国际营';
            $model->Fields['destination']->close = true;//国内目的地隐藏
            $model->Fields['camp_category']->close = false;//国际项目主题显示
            $model->Fields['camp_category']->data_val = ['required'=>true];//国际项目主题不能为空
            $model->Fields['theme']->close = true;//国内项目主题隐藏
            $model->Fields['camp_country']->close = false;//国际目的地显示
            $model->Fields['boarding']->close = false;//国际项目类型显示
            $model->Fields['boarding']->data_val = ['required'=>true];//项目类型不能为空
            $model->Fields['camp_country']->data_val = ['required'=>true];//国际目的地不能为空
           
        }
        $this->setModel($model);
        $model->setFieldVals($row);
        $this->displayModel($model);
    }

    public function editPostAction() {
        $model = new SupplierCampModel(Model::MODEL_EDIT);
        $this->setModel($model);
        $model->autoComplete($vals);
        if (!$model->validation()) {
            $this->displayModel($model);
            return;
        }
        
        $vals['modifytime']=date('Y-m-d H:i:s');
        $xval['fate_min']  = $vals['fate_min'];
        $xval['fate_max']  = $vals['fate_max'];
        $xval['price_min'] = $vals['price_min'];
        $xval['price_max'] = $vals['price_max'];
        $xval['remark']    = $vals['remark'];
        unset($vals['remark']);
        unset($vals['fate_min']);
        unset($vals['fate_max']);
        unset($vals['price_min']);
        unset($vals['price_max']);
        DB::update("@pf_{$model->tbname}", $vals, $this->id);
        $xval['campid'] = $this->id;
        //
        $camp = DB::getone('select * from @pf_camp_extend where campid=?', [$xval['campid']]);
        if($camp){
            $data = DB::update("@pf_camp_extend", $xval,'campid=?',[$this->id]);
        }else{
            DB::insert('@pf_camp_extend', $xval);
        }
        
        $this->success('编辑数据成功');
    }
    
     public function reportAction() {
        
        $iget = ['allow'];
        foreach ($iget as $key) {
            $sch[$key] = SGet($key);
        }
        $this->assign('sch', $sch);

        //国内
        $select = new Select('@pf_camp as c');
        $select->join('@pf_member as m');
        $select->find('c.type,c.camp_category,c.theme,m.parent_id');
        $select->where('and c.seller_id = m.id ');
        if ($sch['allow']!=="") {
        	$select->where('and c.allow = ? ',[$sch['allow']]);
        }
        $select->orderby('m.parent_id');
        //
        $count=$select->getCount();
        if (intval($count)!=0) {
            $list = $select->getPagelist(intval($count));
            $rows = $list->getlist();
        }else{
            $rows=[];
        }
        
        $sum=[]; //国内、国际产品总数量
        $bd_sum=[]; //按bd分类
        $c_sum=[]; //国内主题分类数量
        $g_sum=[]; //国际主题分类数量
        foreach (DB::getOpts('@pf_theme') as $key => $value) {
        	$c_theme[$value[0]]=$value[1];
        }
        foreach (DB::getOpts('@pf_camp_category') as $key => $value) {
        	$g_theme[$value[0]]=$value[1];
        }
        if (!empty($rows)) {
        	foreach ($rows as $key => $value) {
        		//分类一：按国内、国际分类
        		$sum[$value['type']]++;

        		//分类二：按BD分类
        		if ($value['type']==0) {
        			$bd_sum[$value['parent_id']][0]++;
        		}else{
        			$bd_sum[$value['parent_id']][1]++;
        		}

        		//分类三：按主题分类
        		if ($value['type']==0) {
        			$theme=json_decode($value['theme']);
        			if (!empty($theme)) {
        				foreach ($theme as $k => $v) {
	        				$c_sum[$v]++;
	        			}
        			}
        		}else{
        			$camp_category=json_decode($value['camp_category']);
        			if (!empty($camp_category)) {
        				foreach ($camp_category as $k => $v) {
	        				$g_sum[$v]++;
	        			}
        			}
        		}
        	}
        	
        }
        $this->assign("sum",$sum);
        $this->assign("bd_sum",$bd_sum);
        $this->assign("c_sum",$c_sum);
        $this->assign("g_sum",$g_sum);
        $this->assign("c_theme",$c_theme);
        $this->assign("g_theme",$g_theme);
        

		//var_dump($g_sum,$c_sum,$c_sum[3]);
        $this->display('layout/report_supplier_camp_list.tpl');       
    }
    
    
    /**
     * 预上架删除
     * @author ysq
     */
    public function deleteAction() {
        $id  = SGet('id');//var_dump($id);die();
        if(!empty($id)){
            DB::delete("@pf_camp",'where id = ?',[$id]);
            DB::delete("@pf_camp_extend",'where campid = ?',[$id]);
            $this->success("删除成功");
        }
    }
}
