<?php
/**
*@author ysq
*@date 2016-5-12
*分销商提现功能类
**/
 class ApplyController  extends SmcmsController{

/**
**@author ysq
**@date 2016-5-12
**/
	public function listData($select){
		
		//多表连查
		$select->join('@pf_member');
		$select->find('@pf_withdraws_cash.*,@pf_member.mobile');
		$select->where('and @pf_member.id=@pf_withdraws_cash.userid and @pf_member.type=?',[2]);

		//判断搜索框的值是否传过来
		if(!empty($this->sch['mobile'])){
			$select->where("and @pf_member.mobile = ?", [$this->sch['mobile']]);
		}
		
		 return parent::listData($select);
	}
/**
**@author ysq
**@date 2016-5-12
** 分销商提现审核
**/
	public function auditAction(){
		if (empty($this->id)) {
            $this->error('提交数据不完整,请重新提交！');
        }
        $row = DB::getone('select @pf_withdraws_cash.*, @pf_member.mobile from @pf_withdraws_cash join @pf_member on @pf_withdraws_cash.userid=@pf_member.id and @pf_withdraws_cash.id=?', [$this->id]);
        
         $model = new AuditModel(1);
        if (IS_POST) {
            $model->autoComplete($xvals);
            if ($model->validation()) {
                //$vals = array();
                /*$vals['state'] = SPost('state');
                $vals['failmark'] = SPost('failmark');*/
                $xvals['dealtime'] = date('Y-m-d H:i:s');
                DB::update('@pf_withdraws_cash', $xvals, $this->id);
                $this->success('数据编辑成功');
            }
        }
        $xrow = [];
        $xrow['mobile'] = $row['mobile'];
        $xrow['money'] = $row['money'];
        $xrow['applytime'] = $row['applytime'];
        $xrow['realname'] = $row['realname'];
        $model->setFieldVals($xrow);
        $this->displayModel($model);
	}
	
}