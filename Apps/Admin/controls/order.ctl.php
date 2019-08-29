<?php

class OrderController extends SmcmsController {

    public function listData($select) {
        if ($this->sch['state'] >= 0) {
            $select->where('and state >= 0');
        }
        if (SGet('state') != '') {
            $state = IGet('state');
            if ($state == 4) {
                $select->where('and refund=1 and state = 4');
            }elseif($state == 7){
                //state==7 相当于 apply_state=1 已填写报名表(后端)
                $select->where('and apply_state =0 and state in(1,3)');
            } elseif ($state > 4) {
                $select->where('and state=?', [$state]);
            }elseif($state == 1){
                $select->where('and state in(?,?)',[1,3]);
            }else {

                $select->where('and state=? and refund=0', [$state]);
            }
        }
        //判断是否为分销商订单列表 ysq
       if(SGet('user_type')){
            $select->join('@pf_member');
            $select->find('@pf_order.*');
            $select->where('and @pf_member.id = @pf_order.ref_id and @pf_member.type in(?,?)',[2,4]);
        }
        //
        //获取并判断产品类型 ysq
        $val=$this->sch['type'];
        if($val){   
                $select->where("and  @pf_order.type = ?", [$val]);
        }
        if (IGet('key')!= 0) {
            $crm_state = IGet('key');
            switch ($crm_state) {
                case '2':
                    $select->where('and ((crm_state = 1 and state in(0,1,3)) or (crm_state = 4 and state = 4 and refund =1) or crm_state = 9)');
                    break;
                case '4':
                    $select->where('and ((settle_state<3 and state = 4 and refund =1 and crm_state=1 ) or (settle_state=3 and state = 4 and refund =1 and crm_state=3) or crm_state = 7)');
                    break;
                case '3':
                    $select->where('and settle_state=3 and state = 4 and refund =1 and crm_state=1 ');
                    break;
            }
        }
        $url = "www.51camp.cn";
        //产品标题订单号的筛选
        $content = trim($this->sch['content']);
        if($this->sch['screen'] == 1){
            $select->search('and title like ?','%'.$content.'%');
        }else if($this->sch['screen'] == 2){
             $select->search('and orderid like ?','%'.$content.'%');
        }
        $this->assign("key",$crm_state);
        $this->assign("state",$state);
        $this->assign("url",$url);
        $select->orderby('@pf_order.id desc');
        return parent::listData($select);
    }

    public function detailAction() {
        $row = DB::getrow('@pf_order', $this->id);
        $this->assign('rs', $row);
        $chids = DB::getlist('select * from @pf_order_personnel where oid=? order by family asc', [$this->id]);
        $this->assign('chids', $chids);
        $order_logs = DB::getlist('select * from @pf_order_log where order_id=? order by id asc', [$this->id]);
        $this->assign('order_logs', $order_logs);
        $corr_fees = DB::getlist('select * from @pf_order_modify where order_id=? order by id asc', [$this->id]);
        $this->assign('corr_fees', $corr_fees);
        $this->display('order_show.tpl');
    }

    //删除订单
    function deleteAction() {
        if (empty($this->id)) {
            $this->error('提交订单数据不完整,请重新提交！');
        }
        $row = DB::getone('select * from @pf_order where id=?', [$this->id]);
        if (empty($row)) {
            $this->error('订单不存在！');
        }
        if (!($row['state'] == 5 || $row['state'] == 6)) {
            $this->error('订单状态不符，不可删除订单！');
        }
        DB::update('@pf_order', ['state' => -1], $this->id);
        $this->success('订单删除成功！');
    }

    //取消订单
    function cancelAction() {
        if (empty($this->id)) {
            $this->error('提交订单数据不完整,请重新提交！');
        }
        $row = DB::getone('select * from @pf_order where id=?', [$this->id]);
        if (empty($row)) {
            $this->error('订单不存在！');
        }
        if ($row['state'] != 0 || $row['refund'] != 0) {
            $this->error('订单状态不符，不可取消订单！');
        }
        DB::update('@pf_order', ['state' => 6], $this->id);
        $this->success('订单取消成功！');
    }

    
    

   
    function topayAction() {
        if (empty($this->id)) {
            $this->error('提交订单数据不完整,请重新提交！');
        }
        $row = DB::getone('select * from @pf_order where id=?', [$this->id]);
        if (empty($row)) {
            $this->error('订单不存在,请重新提交订单！');
        }

        $model = new TopayModel(1);
        if (IS_POST) {
            $model->autoComplete($xvals);
            if ($model->validation()) {
                $vals = array();
                
                  //**替换新订单201606211812540014 刘斯玉
                    $orderpos=13;//到数第5位
                    $orderid=substr($row['orderid'],0, $orderpos);
                    $ordersec=substr($row['orderid'], $orderpos,1);
                    $ordersec= ((int)$ordersec+1)%10;
                    $orderid.=$ordersec;
                    $orderid.=substr($row['orderid'], $orderpos+1);
                    $vals['orderid'] =$orderid ;
                  //替换结束**
                
                $vals['deposit'] = SPost('topay'); //已经支付定金
                $vals['need_topay'] = SPost('topay'); //已经支付定金
                $split_ratio=$row['commission']/$row['need_topay'];
                $vals['commission'] =$vals['need_topay']*$split_ratio;
                DB::update('@pf_order', $vals, $this->id);
                $this->success('修改订单金额成功！');
            }
        }
        $xrow = [];
       
        
        $xrow['orderid'] =$row['orderid'] ;
        $xrow['title'] = $row['title'];
        $xrow['money'] = $row['need_topay'];
        $xrow['paid'] = $row['paid'];
        $xrow['refund_reasons'] = $row['refund_reasons'];

        $xrow['refund_fees'] = $row['refund_fees'];
        $xrow['refund_remarks'] = $row['refund_remarks'];
        $model->setFieldVals($xrow);
        $this->displayModel($model);
    }
    function applyRefundAction() {
        if (empty($this->id)) {
            $this->error('提交订单数据不完整,请重新提交！');
        }
        $row = DB::getone('select * from @pf_order where id=?', [$this->id]);
        if (empty($row)) {
            $this->error('订单不存在,请重新提交订单！');
        }
        if (!($row['state'] == 1 || $row['state'] == 2 || $row['state'] == 3 || $row['state'] == 10)) {
            $this->error('订单状态不符，不可申请退款！');
        }
        $model = new Apply_refundModel(1);
        if (IS_POST) {
            $model->autoComplete($xvals);
            if ($model->validation()) {
                $vals = array();
                $vals['state'] = 4; //已经支付定金
                $vals['refund'] = 1;
                $vals['crm_state'] = 1;
                $vals['refund_reasons'] = $xvals['refund_reasons']; //已经支付定金
                $vals['refund_fees'] = $xvals['refund_fees']; //已经支付定金
                $vals['refund_remarks'] = $xvals['refund_remarks']; //已经支付定金
                //如果在结算流程进行中，则终止结算
                if ($row['settle_state']==1 || $row['settle_state']==2) {
                    $vals['settle_state']=0;
                }
                
                DB::update('@pf_order', $vals, $this->id);
                $this->success('退款申请提交成功！');
            }
        }
        $xrow = [];
        $xrow['orderid'] = $row['orderid'];
        $xrow['title'] = $row['title'];
        $xrow['mechanism'] = $row['mechanism'];
        $xrow['departure_option'] = $row['departure_option'];
        $xrow['need_topay'] = $row['need_topay'];
        $xrow['refund_fees'] = $row['need_topay'];
        $xrow['paid'] = $row['paid'];

        $model->setFieldVals($xrow);
        $this->displayModel($model);
    }
    function checkRefundAction() {
        $crm=IGet('key');
        if (empty($this->id)) {
            $this->error('提交订单数据不完整,请重新提交！');
        }
        $row = DB::getone('select * from @pf_order where id=?', [$this->id]);
        if (empty($row)) {
            $this->error('订单不存在,请重新提交订单！');
        }
        // if (!($row['state'] == 4 &&$row['refund'] == 1)) {
        //     $this->error('订单状态不符，不可审核！');
        // }
        $model = new Check_refundModel(1);
        //默认销售
        $order_log_type=2;
        if($crm==4){
            //高级销售
            $model->Fields['check_status']->options = array(0 =>[0 => '4', 1 => '通过',],1 =>[0 => '0', 1 => '未通过'] );
            $model->Fields['check_status']->default = '4';
            $model->Fields['refund_fees']->offedit = true;
            //$model->Fields['refund_remarks']->offedit = true;
            $order_log_type=3;
        }elseif ($crm==2) {
            // 财务
            $model->Fields['check_status']->options = array(0 =>[0 => '2', 1 => '通过',],1 =>[0 => '0', 1 => '未通过'] );
            $model->Fields['check_status']->default = '2';
            $model->Fields['corr_fees_type']->close = false;
            $model->Fields['corr_fees']->close = false;
            $model->Fields['corr_fees']->default = $row['need_topay']-$row['refund_fees'];
            $order_log_type=4;
        }elseif ($crm==3) {
            // BD
            $model->Fields['check_status']->options = array(0 =>[0 => '3', 1 => '通过',],1 =>[0 => '0', 1 => '未通过'] );
            $model->Fields['check_status']->default = '3';
            $order_log_type=8;
        }
        if (IS_POST) {
            $model->autoComplete($xvals);
            if ($model->validation()) {
                $vals = array();
                $vals['crm_state'] = intval($xvals['check_status'])==0 ? 2:intval($xvals['check_status']);
                $vals['refund_remarks'] = $xvals['refund_remarks'];

                if($crm!=4){
                    $vals['refund_fees'] = $xvals['refund_fees']; 
                } 
                if ($xvals['check_status']==0) {
                    $vals['refund'] = 0;
                    $vals['state'] = 3; 
                    $order_log=array(); 
                    $order_log['log']='审核未通过，原因为：'.$xvals['log'];
                }else{
                    $order_log=array(); 
                    $order_log['log']='审核通过';

                    if ($crm==2) {
                        $vals['refund'] = 2; 
                        $vals['state'] = 5; 
                        $vals['refund_time'] = date('Y-m-d H:i:s');
                        msg::sendMsg($row['userid'], '退款成功', '您的订单' . $row['orderid'] . '已经退款成功！ 10个工作日内将原路返回！请注意查收！');
                    }
                    //退款审核通过，终止结算流程
                    if ($crm==2&&$row['settle_state']==3) {
                        $vals['settle_state'] = 4;
                    }
                }
                $order_log['order_id']=$this->id;
                $order_log['type']=$order_log_type;
                $order_log['manage_id']=$this->AdmID;
                $order_log['add_time']=date('Y-m-d H:i:s');
                DB::insert('@pf_order_log', $order_log);

                if ($crm==2&&$xvals['corr_fees']!=0) {
                    $corr_fees=array();
                    $corr_fees['order_id']=$this->id;
                    $corr_fees['type']=$xvals['corr_fees_type'];
                    $corr_fees['fees']=$xvals['corr_fees'];
                    $corr_fees['add_time']=date('Y-m-d H:i:s');
                    $corr_fees['check_time']=date('Y-m-d H:i:s');
                    $corr_fees['state']=1;
                    DB::insert('@pf_order_modify', $corr_fees);
                }
                DB::update('@pf_order', $vals, $this->id);
                $this->success('退款审核完成！');
            }
        }
        $xrow = [];
        $xrow['orderid'] = $row['orderid'];
        $xrow['title'] = $row['title'];
        $xrow['mechanism'] = $row['mechanism'];
        $xrow['departure_option'] = $row['departure_option'];
        $xrow['need_topay'] = $row['need_topay'];
        $xrow['paid'] = $row['paid'];

        $xrow['refund_reasons'] = $row['refund_reasons'];
        $xrow['refund_fees'] = $row['refund_fees'];
        $xrow['refund_remarks'] = $row['refund_remarks'];

        $model->setFieldVals($xrow);
        $this->displayModel($model);
    }
    function payDifferenceAction() {
        $crm=IGet('key');
        if (empty($this->id)) {
            $this->error('提交订单数据不完整,请重新提交！');
        }
        $row = DB::getone('select * from @pf_order where id=?', [$this->id]);
        if (empty($row)) {
            $this->error('订单不存在,请重新提交订单！');
        }
        $frow = DB::getone('select * from @pf_order_modify where order_id=? order by id desc', [$this->id]);
        // if (!$row['crm_state'] == 0) {
        //     $this->error('订单状态不符，不可审核！');
        // }
        $model = new Pay_defferenceModel(1);
        //默认销售
        if($crm==4){
            //高级销售
            $model->Fields['check_status']->options = array(0 =>[0 => '9', 1 => '通过',],1 =>[0 => '0', 1 => '未通过'] );
            $model->Fields['check_status']->default = '9';
            $model->Fields['corr_fees_type']->offedit = true;
            $model->Fields['corr_fees']->offedit = true;
            $order_log_type=6;
        }elseif ($crm==2) {
            // 财务
            $model->Fields['check_status']->options = array(0 =>[0 => '10', 1 => '通过',],1 =>[0 => '0', 1 => '未通过'] );
            $model->Fields['check_status']->default = '10';
            $order_log_type=7;
        }elseif ($crm==0) {
            $model->Fields['check_status']->close = true;
            $model->Fields['log']->close = true;
        }
        if (IS_POST) {
            $model->autoComplete($xvals);
            if ($model->validation()) {
                if($crm==0){
                    $corr_fees = array();
                    $corr_fees['type'] = $xvals['corr_fees_type']; 
                    $corr_fees['fees'] = $xvals['corr_fees'];
                    $corr_fees['order_id'] = $this->id;
                    $corr_fees['add_time'] = date('Y-m-d H:i:s');
                    DB::insert('@pf_order_modify', $corr_fees);
                }elseif ($crm==2) {
                    $corr_fees = array();
                    $corr_fees['type'] = $xvals['corr_fees_type']; 
                    $corr_fees['fees'] = $xvals['corr_fees'];
                    $corr_fees['order_id'] = $this->id;
                    $corr_fees['check_time'] = date('Y-m-d H:i:s');
                    if ($xvals['check_status']!=0) {
                        $corr_fees['state'] = 1;
                    }else{
                        $corr_fees['state'] = 2;
                    }
                    DB::update('@pf_order_modify', $corr_fees, $frow['id']);
                }elseif ($crm==4&&$xvals['check_status']==0) {
                    $corr_fees = array();
                    $corr_fees['state'] = 2;
                    DB::update('@pf_order_modify', $corr_fees, $frow['id']);
                }
                 
                if ($crm!=0) {
                    $vals = array();
                    $vals['crm_state'] = intval($xvals['check_status'])==0 ? 2:intval($xvals['check_status']);
                    $order_log=array();
                    $order_log['log']='审核通过'; 
                    if ($xvals['check_status']==0) {
                        $order_log['log']='审核未通过，原因为：'.$xvals['log'];
                    }
                    $order_log['order_id']=$this->id;
                    $order_log['type']=$order_log_type;
                    $order_log['manage_id']=$this->AdmID;
                    $order_log['add_time']=date('Y-m-d H:i:s');
                    DB::insert('@pf_order_log', $order_log);
                }else{
                    $vals = array();
                    $vals['crm_state'] = 7;
                }
                
                DB::update('@pf_order', $vals, $this->id);
                $this->success('退补差价审核完成！');
            }
        }
        $xrow = [];
        $xrow['orderid'] = $row['orderid'];
        $xrow['title'] = $row['title'];
        $xrow['mechanism'] = $row['mechanism'];
        $xrow['departure_option'] = $row['departure_option'];
        $xrow['need_topay'] = $row['need_topay'];
        $xrow['paid'] = $row['paid'];

        
        $xrow['corr_fees_type'] = $frow['type'];
        $xrow['corr_fees'] = $frow['fees'];

        $model->setFieldVals($xrow);
        $this->displayModel($model);
    }
    /**
    *@author ysq
    *@订单状态流转
    */

    public function crm_showAction(){
        $crm = IGet('key');
        $model = new CrmModel(1);
        $row = DB::getone('select * from @pf_order where id=?', [$this->id]);
        if(IS_POST){
            $model->Fields['adddate']->close =false;
            $model->autoComplete($vals);
            $rows=array();//修改所需的数组
            $order_log=array();//审核失败原因所需要的数组
            switch ($crm) {
                case '0'://待销售审核确认                
                        $rows['crm_state'] = 1;
                        $rows['payremark1'] = $vals['payremark1'];
                        $rows['manage_id'] = $vals['manage_id'];
                        $rows['manage_id'] = $vals['manage_id'];
                        $rows['ct2_name'] = $vals['ct2_name'];
                        if($row['state'] == 0){
                            $rows['paytype1'] = $vals['paytype1'];
                           }
                        $model->Fields['paytype1']->close=true;
                    break;
                case '2':
                  //财务审核确认正常订单    
                        if($row['state'] == 0){
                            $rows['paytype1'] = $vals['paytype1'];
                            $rows['paytime1'] = $vals['adddate'];
                        }
                        $rows['paid'] = $row['need_topay'];
                        $rows['crm_state'] = 2; 
                        $rows['state'] = 3;
                        $rows['payremark1'] = $vals['payremark1'];
                        $model->title='财务审核';
                        $order_log['type'] = 1;//财务审核正常订单失败日志代码
                        $model->Fields['paytype1']->close=true;    
                    break;           
            }
            if($vals['check_status'] == 1){//1为审核通过，0为审核失败
                if($crm !=0){
                    $rows['crm_time'] = $vals['adddate'];
                    $order_log['order_id'] = $this->id;
                    $order_log['add_time'] = date('Y-m-d H:i:s');
                    $order_log['manage_id']=$this->AdmID;
                    $order_log['log'] = '审核通过';
                    DB::insert('@pf_order_log',$order_log);
                }
                DB::update('@pf_order', $rows, $this->id);
                
            }else{
                $update['crm_state'] = 0;//如果审核失败改回原来的状态
                $update['payremark1'] = $vals['payremark1'];
                DB::update('@pf_order', $update, $this->id);
                $order_log['order_id'] = $this->id;
                $order_log['add_time'] = date('Y-m-d H:i:s');
                $order_log['manage_id']=$this->AdmID;
                $order_log['log'] = '审核未通过，原因为：'.$vals['error_log'];
                DB::insert('@pf_order_log',$order_log);
            }
            $this->success("审核成功");
            return;
        }
        switch ($crm) {
            case '0'://显示销售审核
                $model->Fields['yifu']->default =$row['need_topay'];
                $model->Fields['check_status']->row_hide=true;
                $model->Fields['error_log']->close=true;
                if($row['state'] != 0){
                    $model->Fields['paytype1']->close=true;
                }
                 $model->Fields['yifu']->offedit = true;
                break;
            case '2':
             //财务审核确认正常订单
                    if(date('ym',strtotime($row['addtime'])) < date('ym',time())){
                        $model->Fields['adddate']->value = $row['addtime'];
                    }
                    $model->Fields['yifu']->default =$row['need_topay'];
                    $model->Fields['adddate']->close =false;
                    $model->title='财务审核';
                    if($row['state'] != 0){
                        $model->Fields['paytype1']->close=true;
                    }
                    $model->Fields['yifu']->offedit = true;
                    $model->Fields['ct2_name']->offedit = true;
                break;     
        }
        $this->setModel($model);//var_dump($model->Fields['adddate']);die();
        $model->setFieldVals($row);
        $this->displayModel($model);
    }



    //供应商结算审核
    
    //计算

    //BD结算审核and高级销售审核列表及财务批量结算审核
    public function settleAction(){
        $key=$_REQUEST['key'];
        $seller_id = SGet('seller_id');//通过供应商条件筛选
        $title = SGet('title');//通过标题查找
        $type=IGet('type');//是否结算过：1结算过
        $model=new SettleModel(1);
        $this->assign('seller_id',$seller_id);
        if(!empty($seller_id)){
            $model->Fields['seller_id']->value=$seller_id;
        }
        $select= new Select('@pf_order as ord');
        $this->assign('key',$key);
        
        if($key==4 || $key==''){//4为高级销售，空为BD
            if ($type==1) {
                $val=3;//where条件
                $refund=7;//供应商退款审核状态
            }elseif($key==4){
                $val=1;//where条件
                $refund=5;//供应商退款审核状态
            }else{
                $val=0; //where条件
                $refund=4;//供应商退款审核状态
            }
          
            $select->find('ord.id,ord.paid+ifnull((select sum(if(type=1,fees,-1*fees)) from @pf_order_modify where @pf_order_modify.order_id=ord.id),0) as paid,ord.orderid,ord.title,ord.payremark1,ord.paytype1,ord.paytime1,ord.payremark2,ord.settle_remark,ord.settle_time,ord.settle_refund_time,ord.refund,ord.campid,ord.need_topay,ord.scommision,ord.manage_id,ord.settle_state,ord.departure_option,@pf_camp.seller_id,@pf_camp.type');
            $select->join('@pf_camp');
            if(!empty($seller_id)){
                $select->search("and @pf_camp.seller_id = ?", $seller_id, Select::SEARCH_NOT_EMPTY);
            }
            if(!empty($title)){
                $select->like_search("and ord.title like ?",$title);
            }
            $select->where('and @pf_camp.id = ord.campid');
            $select->where('and ((state in(?,?) and refund = ? and crm_state in(?,?)and settle_state = ? ) or (state =? and refund = ? and crm_state =? and settle_state = ?))  ',[3,8,0,2,10,$val,5,2,2,$refund]);
            $select->orderby('@pf_camp.seller_id asc');
            if ($type==1) {
                //筛选
                $settle_time = SGet('settle_time');//结算日期
                $settle_time_to = SGet('settle_time_to');//结算日期
                if (!empty($settle_time)) {
                    $select->where('and (ord.settle_time >=? or ord.settle_refund_time>=?)',[$settle_time,$settle_time]);
                }
                if (!empty($settle_time_to)) {
                    $select->where('and(ord.settle_time <=? or ord.settle_refund_time<=?) ',[$settle_time_to." 24:00:00",$settle_time_to." 24:00:00"]);
                }

                $list = $select->getPagelist(20);
                $rows = $list->getlist();
                $this->assign('bar', $list->getinfo());
                $this->assign('rows',$rows);
                $this->assign("title",$title);
                $this->assign('type',$type);
                $this->assign('settle_time',$settle_time);
                $this->assign('settle_time_to',$settle_time_to);
                $this->displayModel($model,'layout/settled_list.tpl');
            }else{
                $rows = $select->getlist();
                $this->assign('rows',$rows);
                $this->assign("title",$title);
                $this->displayModel($model,'layout/settle_list.tpl');
            }
            
                        
            
        }elseif($key==2){//财务最终结算
            
            //显示财务结算列表
            $row=DB::getlist("select o.id,o.paid +ifnull((select sum(if(type=1,fees,-1*fees)) from @pf_order_modify where @pf_order_modify.order_id=o.id),0) as paid,o.orderid,o.campid,o.title,o.refund,o.payremark1,o.payremark2,o.manage_id,o.settle_remark,o.settle_state,o.need_topay,o.departure_option,o.scommision,o.crm_time,mb.nickname,@pf_camp.seller_id from @pf_order as o join @pf_camp join @pf_member as mb on o.campid=@pf_camp.id and  @pf_camp.seller_id = mb.id where (state in(?,?) and refund in(?) and crm_state in(?,?) and settle_state = ?) or (state =? and refund =? and crm_state =? and settle_state = ?)  order by mb.nickname asc ",[3,8,0,2,10,2,5,2,2,6]);
            foreach ($row as $key => $val) {
               $rows[$val['nickname']][$key]=$val;
            }
            $this->assign('rows',$rows);
            $this->display('layout/settle_finance_list.tpl');
        }
        
    }

    public function updatePriceAction(){//修改结算价格
        $model = new SettleModel(1);
        $key=SGet('key');
        if(!empty($key)){
            $model->Fields['key']->value=$key;
        } 
        $model->Fields['seller_id']->close=true;
        $model->Fields['check_status']->close=true;
        $model->Fields['error_log']->close=true;
        if($key==4){
            $model->title="高级销售修改结算价格";
        }else{
            $model->title="BD修改结算价格";
        }
        if(IS_POST){
            $model->autoComplete($vals);
            DB::update('@pf_order',['scommision'=>$vals['scommision'],'settle_remark'=>$vals['settle_remark']],$this->id);
            $order_log['order_id'] = $this->id;
            if(!empty($vals['key'])){
                 $order_log['type']=10;
            }else{
                 $order_log['type']=9;
            }
            $order_log['add_time'] = date('Y-m-d H:i:s');
            $order_log['manage_id']=$this->AdmID;
            if(!empty($vals['key'])){
                $order_log['log'] = '高级销售修改结算价格';
            }else{
                $order_log['log'] = 'BD修改结算价格';
            }
            DB::insert('@pf_order_log',$order_log);
            $this->success("结算价格修改成功");
            return;
        }
        $row = DB::getone("select o.paid+ifnull((select sum(if(type=1,fees,-1*fees)) from @pf_order_modify where @pf_order_modify.order_id=o.id),0) as paid,o.title,o.refund,o.departure_option,o.departure_option,o.scommision,o.settle_remark,mb.nickname from @pf_order as o join @pf_camp join @pf_member as mb on o.campid=@pf_camp.id and  @pf_camp.seller_id = mb.id where o.id =?",[$this->id]);
        $row['title'].='( '.$row['departure_option'].' )';
        $this->setModel($model);
        $model->setFieldVals($row);
        $this->displayModel($model);

    
    }

    //财务单个审核
    public function auditAction(){
        $model = new SettleModel(1);
        $key=SGet('key');
        $model->title="财务结算审核";
        if( !empty($key)){
            $model->Fields['key']->value=$key;
        }
        $model->Fields['seller_id']->close=true;
        $model->Fields['scommision']->type='label';
        if(IS_POST){
            
            $model->autoComplete($vals);
            $settle_state=DB::getrow('@pf_order',$this->id);
            if($vals['check_status'] == '1'){
                if($settle_state['settle_state']==2){
                    $val=3;
                    $settletime='settle_time';//正常订单财务结算审核时间
                    $log = "财务结算审核通过";
                }else{
                    $val=7;
                    $settletime='settle_refund_time';//退款订单财务结算审核时间
                    $log = "财务退款结算审核通过";
                }
                DB::update('@pf_order',['settle_state'=>$val,$settletime=>date('Y-m-d H:i:s'),'settle_remark'=>$vals['settle_remark']],$this->id);
            }else{//如未通过退回到BD审核
                if($settle_state['settle_state'] == 6){
                    $refund=4;
                }else{
                    $refund=0;
                }
                DB::update('@pf_order',['settle_state'=>$refund,'settle_remark'=>$vals['settle_remark']],$this->id);
            }
            $order_log['order_id'] = $this->id;//财务单个结算
            $order_log['type']=13;
            $order_log['add_time'] = date('Y-m-d H:i:s');
            $order_log['manage_id']=$this->AdmID;
            if(!empty($vals['error_log'])){
                   $order_log['log']='财务审核未通过，原因为'.$vals['error_log'];
            }else{
                $order_log['log'] =$log;
            }
            DB::insert('@pf_order_log',$order_log);
            $this->success("财务审核完成",__APPROOT__.'/order/settle?key=2');
        }
        $row = DB::getone("select ord.paid +ifnull((select sum(if(type=1,fees,-1*fees)) from @pf_order_modify where @pf_order_modify.order_id=ord.id),0) as paid,ord.title,ord.refund,ord.departure_option,ord.need_topay,ord.scommision,ord.settle_remark,mb.nickname from @pf_order as ord join @pf_camp join @pf_member as mb on ord.campid=@pf_camp.id and  @pf_camp.seller_id = mb.id where ord.id =?",[$this->id]);
        $row['title'].='( '.$row['departure_option'].' )';
        $this->setModel($model);
        $model->setFieldVals($row);
        $this->displayModel($model);
    }

    //销售\BD审核确认列表及审
    public function settleConfirmAction(){
        $model = new SettleModel(1);
        $key=$_REQUEST['key'];
        $this->assign('key',$key);  
        $ids =implode(',',$_POST['id']); 
        if($_POST['confirm_list'] == '1'){//判断是否由审核确认列表提交
            $info=DB::getlist("select id,settle_state from @pf_order where id in($ids)");
            $refund_id=array();
            $order_id=array();
            foreach ($info as $value) {
                if($value['settle_state'] !=0 && $value['settle_state'] !=1 && $value['settle_state'] !=2){
                    $refund_id[]=$value['id'];//退款状态ID
                }else{
                        $order_id[]=$value['id'];//正常状态ID
                    }
            } 
            $id = implode(',',$order_id);
            $refundid = implode(',',$refund_id); 
            if($_POST['check_status'] === '0'){//如果审核未通过则退回到BD审核
                if(!empty($id)){//正常流转
                    DB::update('@pf_order',['settle_state'=>0],"where id in($id)");
                }
                if(!empty($refundid)){//退款流转
                    DB::update('@pf_order',['settle_state'=>4],"where id in($refundid)");
                }
                $order_log['add_time'] = date('Y-m-d H:i:s');
                $order_log['type'] = 12;
                $order_log['manage_id']=$this->AdmID;
                foreach ($_POST['id'] as  $i) {
                    $order_log['order_id'] = $i;
                    if(in_array($i, $refund_id)){
                        $order_log['log'] = '高级销售退款审核未通过，原因为'.$_POST['error_log'];
                    }else{
                        $order_log['log'] = '高级销售审核未通过，原因为'.$_POST['error_log'];
                    }
                    DB::insert('@pf_order_log',$order_log);
                }
                $this->success('操作成功',__APPROOT__.'/order/settle?key=4');
                return;
            }
            if($key==4){//审核值，4为高级销售待审核，2为财务待审核
                $val=2;//正常流转值
                $refund=6;//退款流转值
                $order_log['type']=12;
                
            }else{
                $val=1;//正常流转值
                $refund=5;//退款流转值
                $order_log['type']=11;
            }
            if(!empty($id)){//正常
                DB::update('@pf_order',['settle_state'=>$val],"where id in($id)");
            }
            if(!empty($refundid)){//退款
                DB::update('@pf_order',['settle_state'=>$refund],"where id in($refundid)");
            }
            
            $order_log['add_time'] = date('Y-m-d H:i:s');
            $order_log['manage_id']=$this->AdmID;
            foreach ($_POST['id'] as  $id) {
                $order_log['order_id'] = $id;
                if(in_array($id, $refund_id)){
                    if($key==4){
                        $log='高级销售退款结算审核';
                    }else{
                        $log='BD结算退款审核';  
                    }
                }else{
                    if($key==4){
                        $log='高级销售结算审核';
                    }else{
                        $log='BD结算审核';
                    }
                }
                $order_log['log'] = $log;
                DB::insert('@pf_order_log',$order_log);
            }
            if(!empty($key)){
                $url = __APPROOT__."/order/settle?key=".$key;
            }else{
                $url=__APPROOT__.'/order/settle';
            }
            
            $this->success("审核成功",$url);
            return;
        }
        //显示审核确认列表
        $row=DB::getlist("select o.id,o.refund,o.orderid,o.title,o.manage_id,o.settle_state,o.need_topay+ifnull((select sum(if(type=1,fees,-1*fees)) from @pf_order_modify where @pf_order_modify.order_id=o.id),0) as need_topay,o.scommision,o.crm_time,mb.nickname,@pf_camp.seller_id from @pf_order as o join @pf_camp join @pf_member as mb on o.campid=@pf_camp.id and  @pf_camp.seller_id = mb.id where o.id in($ids) order by @pf_camp.seller_id asc");
        $this->assign('rows',$row);
        $this->setModel($model);
        $model->setFieldVals($row);
        $this->displayModel($model,'layout/settle_confirm_list.tpl');
    }
    /**
     * 财务提交审核
     * @author ysq
     */
    public function settleFinanceAction(){
        if(IS_POST){//执行财务审核
                $ids = implode(',',$_POST['id']);
                $info=DB::getlist("select id,settle_state from @pf_order where id in($ids)");
                $refund_id=array();
                $order_id=array();
                $order_log = array();
                $order_logs = array();
                $add_time = date('Y-m-d H:i:s');
                $manage_id=$this->AdmID;
                foreach ($info as $value) {
                    $orderid = $value['id'];
                    if($value['settle_state'] == 6){
                        $refund_id[]=$value['id'];//退款状态ID
                        $order_logs[] = "('',$orderid,13,$manage_id,'财务退款结算审核通过','$add_time')";
                    }else if($value['settle_state'] == 2){
                        $order_id[]=$value['id'];//正常状态ID
                        $order_log[] = "('',$orderid,13,$manage_id,'财务结算审核通过','$add_time')";
                    }else{
                        $this->error('订单结算状态非法');
                        return;
                    }
                }
                //正常流转
                if(!empty($order_id) && is_array($order_id)){
                    $id = implode(',',$order_id);
                    DB::update('@pf_order',['settle_state'=>3,'settle_time'=>date('Y-m-d H:i:s')],"where id in($id)");
                    $values = implode(',',$order_log);
                    DB::exec("insert into sl_order_log values".$values);
                }
                //退款流转
                if(!empty($refund_id) && is_array($refund_id)){
                    $refundid = implode(',',$refund_id);
                    DB::update('@pf_order',['settle_state'=>7,'settle_refund_time'=>date('Y-m-d H:i:s')],"where id in($refundid)");
                    $values = implode(',',$order_logs);
                    DB::exec("insert into sl_order_log values".$values);
                }
                $this->success("财务结算成功",__APPROOT__.'/order/settle?key=2');
                return;
            }
        
    }
    
    
    //查看报名表
    public function checkFormAction() {
/*        $orderid = $_GET['id'];
        $order = DB::getone("select * from @pf_order where orderid=?", [$orderid]);
        $product = DB::getone("select * from @pf_camp where id=?",[$order['campid']]);
        $select = new Select('@pf_application');
        $select->find('*');
        $select->where('and order_id=?',[$orderid]);
        $data = $select->getlist();        
        $form = new FormController();
        $form->previewAction($data[0]['base_id'],$data[0]['user_id']);
 */   
        $orderid = $_GET['id'];
        $form = DB::getlist('SELECT * FROM @pf_application where order_id=?',[$orderid]);
        $order = DB::getone("SELECT * FROM @pf_order where orderid=?", [$orderid]);
        $parent = array();$kids = array();
        foreach ($form as $value) {
            if($value['type']==0){
                $kids[] = $value;
            }else{
                $parent[] = $value;
            }
        }
         $remarks = json_decode($order['apply_remarks']);
         $remarks = (array)$remarks; 
        
        $this->assign('parent',$parent);
        $this->assign('kids',$kids);
        $this->assign('others',$remarks);
        $this->display('checkForm.tpl');
            
    }
    
    //修改参营人数
    public function editPeopleAction() {
        $id = IGet('id');
        $order = DB::getone("select * from @pf_order where id=?", [$id]);
        
        if(IS_POST){
            $oid = IPost('id');
            $value['parent'] = IPost('parent');
            $value['tourists'] = IPost('tourists');

            DB::update('@pf_order',$value,$oid);
            $this->success('修改成功！');
        }
        $this->assign('id',$id);
        $this->assign('order',$order);
        $this->display('layout/edit_people_list.tpl');
        
    }


}
