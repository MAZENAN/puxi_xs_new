<?php

if (!defined('SAMAO_VERSION')){
    exit('no direct access allowed');
}
    

class ComplaintModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'complaint';
        $this->type = 1;
        $this->title = '投诉';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        $this->script = '
        $(document).ready(function(){
        var parms = $("input[name=\'parm\']").val();
        if(parms == 1){
            $(\'.form-submit\').hide();
            
            }
         $(\'.back\').click(function(){
            window.close();
            })
        });';

        parent::__construct($modeltype);
    }

    public function fields() {
        return array(   
//            'title'=>array(
//                'label'=>'标题',
//                'label_width'=>120,
//                'type'=>'label',  
//            ),
            'content'=>array(
                'label'=>'处理内容',
                'label_width'=>120,
                'type'=>'textarea',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '内容不能为空',
                ),
                
            ),
             'manage_id'=>array(
                'label'=>'处理人',
                'label_width'=>120,
                 'options'=>DB::getopts('@pf_manage',null,0,"type in(7,13) and islock = 0"),
                'type'=>'select',
                 'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '处理人不能为空',
                ),
                'header' => array(
                  0 => '',
                  1 => '选择处理人',
              ),
                 
            ),
        );
    }
}
