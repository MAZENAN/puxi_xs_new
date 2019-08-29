<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class ApplicationModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'application';
        $this->type = 1;
        $this->title = '报名表信息';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

   /*     $this->script = '$(function(){
        var selectfun=function(){
        var val=$(\'#status\').val();
        if(val==3){
             $(\'#row_ref_mark\').show();
        }else{
             $(\'#row_ref_mark\').hide();
        }
   }
    selectfun();
    $(\'#status\').change(selectfun);
});';*/

        parent::__construct($modeltype);
    }

    public function fields() {
       
      return array(
       
            'patriarch_name' => array(
               'label' => '家长名称',
               'label_width' => 150,
                'type' => 'text',
               //'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '家长姓名不能为空',
                )
            ),

       );
    }

}
