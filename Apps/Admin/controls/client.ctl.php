<?php


class ClientController extends SmcmsController{

    public function indexAction(){
        $this->doact('*');
          
         $select = new Select('@pf_client as client');
         $select->leftJoinMore('@pf_member as m', 'client.user_id=m.id');        
         $select->find('DISTINCT(client.name),client.wname,client.mobile,client.area,m.id,m.parent_id,(select 1 from @pf_client limit 0,1 )');
         $select->where(' and m.type=1');//纯会员
         
//性别//年龄筛选//年龄筛选//购买情况//跟进记录//感兴趣的营期//客户来源//客户成熟度//学校类型//护照国籍//地域//销售//手机号  
         $iget = ['gender', 'agefrom', 'ageto','buy','client_record','interest_camp','client_source',
             'level','school_type','nationality','area','parent_id','mobile'];
         foreach ($iget as $key) {
            $sch[$key] = SGet($key);
         }
//            if($sch['client_source'] || $sch['interest_camp'] || $sch['level']){
                if($sch['client_source']){
                    $select->where(' and client.client_source=?',[$sch['client_source']]);
                }
                if($sch['interest_camp']){
                    $select->search(' and client.interest_camp like ?','%'.'"'.$sch['interest_camp'].'"'.'%');
                }
                if($sch['level']){
                    $select->where(' and client.level = ?',[$sch['level']]);
                }
                
//            }
            
            if ($sch['agefrom'] || $sch['ageto'] || $sch['gender'] || $sch['school_type'] || $sch['nationality']) {
                $select->leftJoinMore("@pf_camper as camper","m.id = camper.user_id");
                $select->where('and camper.type = ?', [0]);
                $select->group('camper.user_id');
//                if (!empty($sch['agefrom']) && !empty($sch['ageto'])) {
//                    if ($sch['agefrom'] < $sch['ageto']) {
//                        $select->where("and (camper.age >= ? and camper.age <= ?)", [$sch['agefrom'], $sch['ageto']]);
//                    } else {
//                        $select->where("and (camper.age <= ? and camper.age >= ?)", [$sch['agefrom'], $sch['ageto']]);
//                    }
//                }
                 //根据年龄筛选
                if(!empty($sch['agefrom'])){
                    $select->where("and camper.age >= ? ", [$sch['agefrom']]);
                }
                if(!empty($sch['ageto'])){
                    $select->where("and camper.age <= ? ", [$sch['ageto']]);
                }
                //根据子女性别筛选
                if (!empty($sch['gender'])) {
                    $val = $sch['gender'] == 1?1:0;
                    $select->where('and camper.c_gender = ?', [$val]);
                }
                //学校类型
                if($sch['school_type']){
                    $select->where(' and camper.school_type=?',[$sch['school_type']]);
                }
                //孩子护照国籍
                if($sch['nationality']){
                    $select->where(' and camper.nationality=?',[$sch['nationality']]);
                }
                
            }
            //根据购买情况筛选
            if (!empty($sch['buy'])) {
                $select->leftJoinMore("@pf_order",'m.id = @pf_order.userid');
               // $select->on('@pf_member.id = @pf_order.userid');
                
                if ($sch['buy'] == 2) {
//                    $selectA = new Select('@pf_member m');
//                    $selectA->leftJoinMore('@pf_client c', 'm.id=c.user_id');
//                    $selectA->leftJoinMore('@pf_order o', 'm.id=o.userid');
//                    $selectA->find('DISTINCT(c.name),c.wname,c.mobile,c.area,m.id,(select 1 from @pf_client limit 0,1 )');
                    $select->where(' and @pf_order.userid IS NULL');
//                    $select->where('and @pf_order.state < 3');//未购买
//                    $select->union($selectA);
               } else {
                   $select->where('and @pf_order.state in(1,3,5,8)');//已购买,6为已取消
              }
            }
            //用跟进记录筛选 
            if(!empty($sch['client_record'])){
                $select->leftJoinMore('@pf_client_record as record','m.id = record.client_id ');
                $select->group('m.id ');
                switch ($sch['client_record']){
                    case '1'://一周内的跟进记录
                        $val = $this->dates(7);
                        $select->where('and record.add_time > ?',[$val]);
                        break;
                    case '2'://一个月内的跟进记录
                        $val =  $this->dates(30);
                        $select->where('and record.add_time > ?',[$val]);
                        break;
                    case '3'://90天内未跟进记录
                        $val = $this->dates(90);
                        $info = DB::getlist("select client_id,MAX(add_time) as add_time from @pf_client_record where client_id in(select client_id from @pf_client_record where add_time < ?) and @pf_client_record.type =? group by @pf_client_record.client_id",[$val,1]);
                        foreach($info as  $value){
                            if($value['add_time'] < $val){
                                $client_id[] = $value['client_id'];
                            }
                        }
                        $id = $client_id ? implode(',',$client_id):'0';
                        $select->where("and record.client_id in($id)");
                        break;
                    case '4'://没有跟进过的
                        $select->where('and ISNULL(record.client_id)');
                        break;
                } 
            }
            
        //地区筛选 在member表里筛选
            if(!empty($sch['area'])){
                $select->search('and client.area like ?','%"'.$sch['area'].'"%');
            }
        //所属销售 member
            if(!empty($sch['parent_id'])&&$sch['parent_id']!=1000){
                $select->where('and m.parent_id=?',[$sch['parent_id']]);
            }else if($sch['parent_id']==1000){
                $select->where(" and (m.parent_id IS NULL OR m.parent_id = '' OR m.parent_id = '0') ");
            }
            //电话搜索
            if(!empty($sch['mobile'])){
                $select->like_search("and client.mobile like ?", $sch['mobile']);
            }
            $select->orderby('m.id desc'); 
//        $select->orderby('add_time', 'desc');
            $list = $select->getPagelist();
            $rows = $list->getlist();
            //对应的学生信息
            foreach($rows as $k=>$v){
//                print_r($v['id']);
                 $ordernum = DB::getone("select COUNT(orderid) as num from @pf_order where userid=? and state in (1,3,5,8)",[$v['id']]);
                 $ordernum_tmp=DB::getone("select COUNT(id) as num from @pf_form_temp where mobile=?",[$v['mobile']]); 
                 $ordernum['num']= $ordernum['num']+ $ordernum_tmp['num']/2;
             
                $rows[$k]['kids'] = DB::getlist("select c_name,c_gender,school,DATE_FORMAT(c_birthday,'%Y-%m-%d') c_birthday, (year(now())-year(c_birthday)-1) + ( DATE_FORMAT(c_birthday, '%m%d') <= DATE_FORMAT(NOW(), '%m%d') ) as age  
                from @pf_camper where user_id=? and type=0 group by c_name order by id desc", [$v['id']]);
                $rows[$k]['num'] = $ordernum['num'];
            }

            //所属销售
            $parent = DB::getopts('@pf_manage',null,0,"type in(7,13) and islock = 0");
            $parent[] = [1000,'无销售'];
            $this->assign('parent', $parent);
            $this->assign('sch', $sch);
            $this->assign('rows',$rows);
            $this->assign('bar', $list->getinfo());
            $this->display('layout/client_list.tpl');   
        }
        
    /**
     * 返回日期
     */
    public function dates($day){
        return date('Y-m-d H:i:s',time()-60*60*24*$day);
    }
    public function showGetAction() {
        $row = DB::getone('select * from @pf_member where id=?', [$this->id]);
        if (!$row) {
            $this->error('账号已被删除！', __APPROOT__ . '/index/welcome', 3, 0, 'window.closeDialog();');
        }
        $this->assign('rs', $row);
        $this->display('user_show.tpl');
    }
    
}