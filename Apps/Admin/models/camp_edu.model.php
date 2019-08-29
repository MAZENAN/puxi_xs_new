<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class CampEduModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'camp_edu';
        $this->type = 1;
        $this->title = '营地教育';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        $this->script = '$(document).ready(function() {
            $("#related_campid").change(function(){ 
            var campid = $(this).val();
            var  z =  /^[0-9,]+$/;
                if(!z.test(campid ) && campid != ""){
                var html = \'<span id="related_campid_info" class="field-info field-val-error">请填写有正确的产品ID</span>\';
                   $("#related_campid_info").remove();
                   $(this).after(html);
                   $(this).attr(\'data_valmsg_for\',"#related_campid_info");
                   $(this).attr("class","form-control text input-val-error");
                   $(".submit").attr("onclick","return false");
                }else{
                    $("#related_campid_info").remove();
                    $("#related_campid").attr("class","form-control text input-val");
                    $(".submit").attr("onclick","return true");
                }
            });
            $("#related_read").change(function(){ 
            var campeduid = $(this).val();
            var  z =  /^[0-9,]+$/;
                if(!z.test(campeduid ) && campeduid != ""){
                var html = \'<span id="related_read_info" class="field-info field-val-error">请填写有正确的文章ID</span>\';
                   $("#related_read_info").remove();
                   $(this).after(html);
                   $(this).attr(\'data_valmsg_for\',"#related_read_info");
                   $(this).attr("class","form-control text input-val-error");
                   $(".submit").attr("disabled","true");
                }else{
                    $("#related_read_info").remove();
                    $("#related_read").attr("class","form-control text input-val");
                    $(".submit").attr("disabled",false);
                }
            });
        });';
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
        'title' => array (
        'label' => '标题',
        'label_width' => 150,
        'type' => 'text',
        'style' => 'width:350px;',
        'data_val' => array (
          'required' => true,
        ),
        'data_val_msg' => array (
          'required' => '标题不能为空',
        ),
        ),
        'img' => array (
        'label' => 'PC端图片',
        'label_width' => 150,
        'type' => 'upimg',
        'img_width' => 300,
        'img_height' => 200,
        'extensions' => 'jpg,jpeg,gif,png',
        ),
        'mobile_img' => array (
        'label' => '移动端图片',
        'label_width' => 150,
        'type' => 'upimg',
        'img_width' => 230,
        'img_height' => 180,
        'extensions' => 'jpg,jpeg,gif,png',
        ),
        'intro' => array (
        'label' => '摘要介绍',
        'label_width' => 150,
        'type' => 'textarea',
        'style' => 'width:500px; height:150px;',
        'data_val' => array (
          'required' => true,
        ),
        'data_val_msg' => array (
          'required' => '摘要介绍不能为空',
        ),
        ),
        'target' => array (
        'label' => '展示位置',
        'label_width' => 150,
        'type' => 'checkgroup',
        'options'=>array(
            0=>array(
                0=> 0,
                1=>'PC端'
            ),
            1=>array(
                0=> 1,
                1=>'移动端'
            ) ,
        ),
        'data_val' => array (
          'required' => true,
        ),
        'data_val_msg' => array (
          'required' => '展示位置不能为空',
        ),
        ),
        'source' => array (
        'label' => '来源',
        'label_width' => 150,
        'type' => 'text',
        'default' => '营天下',
        ),
        'type' => array (
        'label' => '文章类型',
        'label_width' => 150,
        'type' => 'select',
/*        'options' => DB::getOpts('@pf_article_type','id,name'),
//        'header'=>array(
//            '0'=>'',
//            '1'=>'选择文章类型',
//          ),
//        'data_val' => array (
//            'required' => true,
//          ),
//        'data_val_msg' => array (
//          'required' => '文章类型不能为空',
//        ),*/
         'close'=>true,
        ),
        //推荐到
        'commend' => array(
             'label' => '推荐到',
             'label_width' => 150,
             'type' => 'checkgroup',
            'options' => array (
              0 => 
              array (
                0 => '1',
                1 => '阅读无公害',
              ),
              1 => 
              array (
                0 => '2',
                1 => '趣味学堂',
              ),
            ),
         ),

         //所属课程体系
        'is_top' => array(
             'label' => '所属课程体系',
             'label_width' => 150,
             'type' => 'text',
             'close'=>true,
         ),
            
        'is_link' => array(
        'label' => '是否启用外部链接',
        'label_width' => 150,
        'type' => 'bool',
        'dynamic' => array (
            0 => 
            array (
                'val' => '0',
                'hide' => 'link_url',
                'show' =>'content',
                
            ),
            1 => 
            array (
                'val' => '1',
                'show' => 'link_url',
                'hide' =>'content',

            ),
            2 => 
            array (
                'val' => '1',
                //'show' => 'link_url',
                'hide' =>'article_label',

            ),
            3 => 
            array (
                'val' => '1',
                //'show' => 'link_url',
                'hide' =>'related_campid',

            ),
            4 => 
            array (
                'val' => '1',
                //'show' => 'link_url',
                'hide' =>'related_read',

            ),
          5 => 
            array (
                'val' => '0',
                'show' => 'related_read',

            ),
            6 => 
            array (
                'val' => '0',
                'show' => 'related_campid',

            ),
            7 => 
            array (
                'val' => '0',
                'show' => 'article_label',

            ),
        ),
        ),
        'link_url' => array(
                'label' => '外部链接url地址',
                'label_width' => 150,
                'type' => 'text',
                'style'=>'width:300px;',
                'tip_back' => '例如：http://www.baidu.com',
                'data_val' => array(
                    'required' => true,
                ),
                 'data_val_msg' => array(
                  'required' => '请填写url地址',
              ),
            ),
        
        'add_time' => array (
        'label' => '添加时间',
        'label_width' => 150,
        'type' => 'datetime',
        'default' => date('Y-m-d H:i:s'),
        ),
        'related_campid' => array (
        'label' => '关联营地产品ID',
        'label_width' => 150,
        'type' => 'text',
         'placeholder'=>'粘贴产品ID，用英文逗号分隔',
        ),
            
        'related_read' => array (
        'label' => '相关阅读',
        'label_width' => 150,
        'type' => 'text',
         'placeholder'=>'粘贴文章ID，用英文逗号分隔',
        ),
        'tag_id0' => array(
                //'label' => '选择课程体系',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'close'=>true,
            ),
            'tag_id1' => array(
                //'label' => '选择课程体系',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'close'=>true,
            ),
            'tag_id2' => array(
                //'label' => '选择课程体系',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'close'=>true,
            ),
            'tag_id3' => array(
                //'label' => '选择课程体系',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'close'=>true,
            ),
            'tag_id4' => array(
                //'label' => '选择课程体系',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'close'=>true,
            ),
            'tag_id5' => array(
                //'label' => '选择课程体系',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'close'=>true,
            ),
            
            
        //成长课堂 教育风向  课程体系 
        'ctag_id' => array(
            'label' => '成长课堂标签',
            'label_width' => 150,
            'type' => 'checkgroup',
            'header' => array(
                0 => '',
                1 => '成长课堂标签',
            ),
            'options' => DB::getOpts('@pf_tag',"id,title",0,"type=0 and pid=0"),           
           
        ), 
        //文章公用标签
        'tag_id' => array(
           'label' => '文章标签',
            'label_width' => 150,
            'type' => 'checkgroup',
            'header' => array(
                    0 => '',
                    1 => '文章公用标签',
                ),
            'options' => DB::getOpts('@pf_tag',"id,title",0,"type=3 and pid=0"),
            //'merge' => true,
            //'merge_type' => '1',
        ), 
        
        'click' => array (
        'label' => '点击量',
        'label_width' => 150,
        'type' => 'digits',
        'default' => '0',
        'close_html' => true,
        ),
        'sort' => array (
        'label' => '权重排序',
        'label_width' => 150,
        'type' => 'digits',
        'default' => $this->getNextSort('id'),
        'close_html' => true,
        'offedit' => true,
        'tip_back' => '越大的值越靠前，每次跨度不要太大可能会超出',
        'data_val' => array (
          'required' => true,
          'digits' => true,
        ),
        'data_val_msg' => array (
          'required' => '权重排序不能为空',
          'digits' => '权重排序必须是整数形式',
        ),
        ),
        'allow' => array (
        'label' => '是否审核',
        'label_width' => 150,
        'type' => 'bool',
        'default' => '0',
        'close' => true,
        'offedit' => true,
        'tip_back' => '勾选后正式发布',
        ),

        'content' => array (
            'label' => '详细内容',
            'label_width' => 150,
            'type' => 'xheditor',
            'data_val' => array (
              'required' => true,
            ),
            'data_val_msg' => array (
              'required' => '内容不能为空',
            ),
        ),

                );
    }
}
