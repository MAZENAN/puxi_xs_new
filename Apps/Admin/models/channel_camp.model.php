<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class ChannelCampModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'channel_camp';
        $this->type = 1;
        $this->title = '频道-产品列表';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
        'channel_id' => array (
            'label' => '频道id',
            'label_width' => 200,
            'type' => 'text',
            'row_hide'=>true,
        ),
         'camp_id' => array(
                'label' => '产品id',
                'label_width' => 150,
                'type' => 'text',
            ),
        'sort' => array(
         'label' => '排序',
         'label_width' => 150,
         'type' => 'text',
         'row_hide'=>true,
     ),
 

        );
    }
}
