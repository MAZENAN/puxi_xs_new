<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class CampModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'camp';
        $this->type = 1;
        $this->title = '';
        $this->istab = true;
        $this->tabsplit = false;
        $this->tabs = array(
            'base' => '基本信息',
            'intro' => '项目介绍',
            'xinc' => '日程备注',
            'other' => '其他及注意事项',
            'extend'=>'预上架产品信息'
        );
        $this->basecontroler = 'SamaoToolController';
        $this->btns_left = 0;
        $this->script = '
function inputChange(inputid){
  $(inputid).change(function(){
    $(inputid).children("option").each(function(){
       if($(this).attr("selected")=="selected"){
        $(inputid).next().children("input").val($(this).text());
       }
    });
  });
}
function vagueSearch(inputid){
          $(inputid).click(function(){
            $(this).next().css("zIndex","999");
          });
          $(inputid).next().children("input").bind("input propertychange",function(){
            $(inputid).next().next().show();
            $(document).one("click",function(e){                         
                $(inputid).next().next().hide();   
                e.stopPropagation();           
            });
            $(inputid).next().next().click(function(e){
                e.stopPropagation();
            });
            $(inputid).next().next().children("ul").empty();
            $(inputid).children("option").each(function(){
                if($(this).text().indexOf($(inputid).next().children("input").val())>=0){
                    var otext=$(this).text();
                    $(inputid).next().next().children("ul").append("<li data-id="+$(this).val()+">"+otext+"</li>");
                }
            });
            $(inputid).next().next().children("ul").children("li").each(function() {
                $(this).click(function(){
                    var thisid=$(this).data("id");
                    $(inputid).next().children("input").val($(this).text());
                    $(inputid).next().next().hide();
                    $(inputid).children("option").each(function(){
                        if($(this).val()==thisid){
                            $(this).attr("selected","selected");
                            $(inputid).change();
                        }
                    });
                });
            });
          });
} 
$(document).ready(function() {
    $(".form-tabs b").click(function(){
        if($("#form_tabs_extend").is(":visible")==false){
           $(".form-submit").show();
        }else{
            $(".form-submit").hide();
        }
    });
    /*模糊查询加节点*/
    var addressHtml="<div class=\"address_cont\" style=\"width:100px\"><input placeholder=\"选择目的地\" autocomplete=\"off\" name=\"country\" style=\"width:100px\" class=\"form-control text\"/></div><div class=\"address_select\"><ul></ul></div>";
    $("#destination,#camp_country").wrap("<div class=\"address_s\"></div>");
    $(".address_s").append(addressHtml);
    var sellerHtml="<div class=\"seller_cont\"><input placeholder=\"选择供应商\"  autocomplete=\"off\" class=\"form-control text\" style=\"width:200px;\"/></div><div class=\"seller_select\"><ul></ul></div>";
    $("#seller_id").wrap("<div class=\"supplier\"></div>");
    $(".supplier").append(sellerHtml);
        //
    inputChange(seller_id);
    if($("#camp_country").length>0){
        inputChange(camp_country);
        vagueSearch(camp_country);
    }
    if($("#destination").length>0){
        inputChange(destination);
        vagueSearch(destination);
    }

    $("#title").keyup(function(){       
         if (event.keyCode == "13") {
    　　　　　$("#camp-form").submit();
            return false;
        }
    });
    $(".samao-mini-btn-search").click(function(){
        $("#camp-form").submit();
    }); 
    /*供应商模糊查询*/
     vagueSearch(seller_id);
    //
            
});';
        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
                    
            'title' => array(
                'label' => '标题',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '标题不能为空',
                ),
            ),
             
            'en_title' => array(
                'label' => '英文标题',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
            ),
            'lightspot' => array(
                'label' => '一名话亮点',
                'label_width' => 150,
                'style'=>'width:410px',
                'type' => 'text',
                'maxlength'=>30,
                'tab' => 'base',
                'tip_back' => '30个字以内。'
                ),
            'tags' => array(
                'label' => '标签简要',
                'label_width' => 150,
                'type' => 'textarea',
                'tab' => 'base',
            ),
            'cover' => array(
                'label' => '封面图片',
                'label_width' => 150,
                'type' => 'upimg',
                'tab' => 'base',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
            ),
            'camp_country' => array (
            'label' => '目的地',
            'label_width' => 150,
            'type' => 'select',
            'tab' => 'base',
            'options' => DB::getOpts('@pf_camp_country'),
            'data_val_msg' => array (
              'required' => '请选择目的地',
            ),
            'header' => array (
              0 => '',
              1 => '选择目的地',
            ),
            ),
             'destination' => array(
                'label' => '国内目的地',
                'label_width' => 150,
                'type' => 'select',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_destination'),
                'data_val_msg' => array(
                    'required' => '请选择国内目的地',
                ),
                'header' => array(
                    0 => '',
                    1 => '选择国内目的地',
                ),
            ),
             'camp_location' => array(
                'label' => '项目地点',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
                'style' => 'width:350px;',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '项目地点不能为空',
                ),
            ),
            'agefrom' => array(
                'label' => '适合年龄',
                'label_width' => 150,
                'type' => 'amountdigits',
                'tab' => 'base',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '适合年龄不能为空',
                    'digits' => '适合年龄必须是整数形式',
                ),
                '@minititle' => '从：',
            ),
            'ageto' => array(
                'label' => '到',
                'label_width' => 150,
                'type' => 'amountdigits',
                'tab' => 'base',
                'merge' => true,
                'merge_type' => '1',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '适合年龄不能为空',
                    'digits' => '适合年龄必须是整数形式',
                ),
                'follow_text' => '岁',
                '@minititle' => '到',
            ),
             'camp_days' => array(
                'label' => '为期天数',
                'label_width' => 150,
                'type' => 'amountdigits',
                'tab' => 'base',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '为期天数不能为空',
                    'digits' => '为期天数必须是整数形式',
                ),
                'follow_text' => '天',
            ),
            //ysq 2016-5-16
            'camp_holiday' => array (
                'label' => '活动时间',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_camp_holiday'),
                'style' => 'width:80px;',
            ),
'camp_category' => array (
'label' => '国际项目主题',
'label_width' => 150,
'type' => 'checkgroup',
'tab' => 'base',
'options' => DB::getOpts('@pf_camp_category'),
'style' => 'width:auto; margin-right:15px;',
'data_val_msg' => array (
  'required' => '请选择项目主题',
),
'header' => array (
  0 => '',
  1 => '选择项目主题',
),
),
            'theme' => array(
                'label' => '国内项目主题',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_theme'),
                'style' => 'width:auto; margin-right:15px;',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择项目主题',
                ),
                'header' => array(
                    0 => '',
                    1 => '选择项目主题',
                ),
            ),
                'boarding' => array (
                'label' => '项目类型',
                'label_width' => 150,
                'type' => 'radiogroup',
                'tab' => 'base',
                'options' => array (
                  0 => 
                  array (
                    0 => '0',
                    1 => '日营',
                  ),
                  1 => 
                  array (
                    0 => '1',
                    1 => '寄宿营',
                  ),
                  2 => 
                  array (
                    0 => '2',
                    1 => '游学',
                  ),
                ),
                'data_val_msg' => array(
                     'required' => '请选择项目类型',
                ),
                ),
             'camp_type' => array(
                'label' => '是否亲子',
                'label_width' => 150,
                'type' => 'radiogroup',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_camp_type'),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择是否亲子',
                ),
                'header' => array(
                    0 => '',
                    1 => '选择是否亲子',
                ),
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
            'camp_tag' => array(
                'label' => '产品标签',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_tag',"id,title",0,"type=4 and pid=0"),
                 'headers' => array(
                    0 => '产品标签',
                ),
            ),
             'deadline' => array(
                'label' => '报名截止日期',
                'label_width' => 150,
                'type' => 'date',
                'tab' => 'base',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '报名截止日期不能为空',
                ),
            ),
             'base_id' => array(
                'label' => '报名表',
                'label_width' => 150,
                 'type' => 'select',
                 'options' => DB::getopts('@pf_form_base',"id,title",0,null),
                  'valtype' => 'int',
		 'tab' => 'base',
                  'header' => array(
                    0 => '',
                    1 => '选择报名表种类',
                ),
                 'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '报名表不能为空',
                ),
            ),
            'click' => array(
                'label' => '点击量',
                'label_width' => 150,
                'type' => 'digits',
                'tab' => 'base',
                'default' => '0',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '点击率不能为空',
                    'digits' => '点击率必须是整数形式',
                ),
            ),
            'mechanism' => array(
                'label' => '服务机构',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
            ),
              'seller_id' => array(
                'label' => '所属供应商',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getopts('@pf_member','id,nickname',0,"type in(3,4) and status=2"),
                'valtype' => 'int',
                'tab' => 'base',
                'header' => array(
                    0 => '',
                    1 => '选择供应商',
                ),
            ),
            
           
            


           

           

           
            // 'cost' => array(
            //     'label' => '费用',
            //     'label_width' => 150,
            //     'type' => 'digits',
            //     'tab' => 'base',
            //     'close' => true,
            //     'data_val' => array(
            //         'required' => true,
            //         'digits' => true,
            //     ),
            //     'data_val_msg' => array(
            //         'required' => '费用不能为空',
            //         'digits' => '费用必须是整数形式',
            //     ),
            //     'follow_text' => '元',
            // ),
            // 'deposit' => array(
            //     'label' => '预付订金',
            //     'label_width' => 150,
            //     'type' => 'digits',
            //     'tab' => 'base',
            //     'merge' => true,
            //     'merge_type' => '1',
            //     'close' => true,
            //     'data_val' => array(
            //         'required' => true,
            //         'digits' => true,
            //     ),
            //     'data_val_msg' => array(
            //         'required' => '预付订金不能为空',
            //         'digits' => '预付订金必须是整数形式',
            //     ),
            //     'follow_text' => '元',
            // ),
            // 'tourists' => array(
            //     'label' => '参游人数',
            //     'label_width' => 150,
            //     'type' => 'amountdigits',
            //     'tab' => 'base',
            //     'default' => '1',
            //     'close' => true,
            //     'data_val' => array(
            //         'required' => true,
            //         'digits' => true,
            //     ),
            //     'data_val_msg' => array(
            //         'required' => '参游人数不能为空',
            //         'digits' => '参游人数必须是整数形式',
            //     ),
            //     'follow_text' => '人',
            //     '@minititle' => '学生：',
            // ),
            // 'parent' => array(
            //     'label' => '家长',
            //     'label_width' => 200,
            //     'type' => 'amountdigits',
            //     'tab' => 'base',
            //     'merge' => true,
            //     'merge_type' => '1',
            //     'default' => '0',
            //     'close' => true,
            //     'data_val' => array(
            //         'required' => true,
            //         'digits' => true,
            //     ),
            //     'data_val_msg' => array(
            //         'required' => '参游人数不能为空',
            //         'digits' => '参游人数必须是整数形式',
            //     ),
            //     'follow_text' => '人',
            // ),
            
//            'camp_age' => array(
//                'label' => '适合学生段',
//                'label_width' => 150,
//                'type' => 'checkgroup',
//                'tab' => 'base',
//                'options' => DB::getOpts('@pf_camp_age'),
//                'style' => 'width:80px;',
//            ),
            
            //
           
              
            
            
            
           
            // 'gender' => array(
            //     'label' => '性别要求',
            //     'label_width' => 150,
            //     'type' => 'radiogroup',
            //     'tab' => 'base',
            //     'options' => array(
            //         0 =>
            //         array(
            //             0 => 'all',
            //             1 => '不限制',
            //         ),
            //         1 =>
            //         array(
            //             0 => 'boy',
            //             1 => '男孩',
            //         ),
            //         2 =>
            //         array(
            //             0 => 'girl',
            //             1 => '女孩',
            //         ),
            //     ),
            //     'default' => 'all',
            //     'style' => 'width:80px;',
            // ),
            
          
/*'starting_city' => array (
'label' => '出发城市',
'label_width' => 150,
'type' => 'checkgroup',
'tab' => 'base',
'options' => DB::getOpts('@pf_starting_city'),
'style' => 'width:80px;',
'data_val_msg' => array (
  'required' => '请选择出发城市',
),
),*/


          
            'level_id' => array(
                'label' => '产品等级',
                'label_width' => 150,
                'type' => 'select',
                'tab' => 'base',
                'options' => DB::getopts('@pf_camp_level'),
                'header' => array(
                    0 => '',
                    1 => '选择产品等级',
                ),
            ),
			//2016.05.04增加国内夏令营类型ID（adpage_id） select选择框
			'adpage_id' => array(
                'label' => '所属广告分类',
                'label_width' => 150,
                'type' => 'select',
                 'options' => DB::getopts('@pf_adpage',null,0,null),
                  'valtype' => 'int',
				  'tab' => 'base',
                  'header' => array(
                    0 => '',
                    1 => '选择广告分类',
                ),
            ),
            'stick_label' => array(
                'label' => '置顶标签',
                'label_width' => 150,
                'type' => 'select',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_stick_label'),
                 'header' => array(
                    0 => '',
                    1 => '选择置顶标签',
                ),
            ),
            // 'starting_city' => array(
            //     'label' => '出发城市',
            //     'label_width' => 150,
            //     'type' => 'checkgroup',
            //     'tab' => 'base',
            //     'options' => DB::getOpts('@pf_starting_city'),
            //     'close' => true,
            //     'style' => 'width:80px;',
            //     'data_val' => array(
            //         'required' => true,
            //     ),
            //     'data_val_msg' => array(
            //         'required' => '请选择出发城市',
            //     ),
            // ),
            // ysq
            'istop' => array(
                'label' => '精品推荐',
                'label_width' => 150,
                'type' => 'bool',
                'tab' => 'base',
                'tip_back' => '勾选后将在精品推荐中显示。',
            ),
            //
            'features' => array(
                'label' => '营的序',
                'label_width' => 150,
                'type' => 'textarea',
                'tab' => 'intro',
            ),
            'continue_img' => array(
                'label' => '序的图片',
                'label_width' => 150,
                'type' => 'upimg',
                'tab' => 'intro',
                'img_width' => 160,
                'img_height' => 160,
                'extensions' => 'jpg,jpeg,gif,png',
                'tip_back' => '图片规格为160 × 160。'
                ),
            'object_oriented' => array(
                'label' => '项目特色',
                'label_width' => 150,
                'type' => 'textarea',
                'tab' => 'intro',
                'close' => true,
                'offedit' => true,
            ),
            'content' => array(
                'label' => '项目介绍',
                'label_width' => 150,
                'type' => 'xheditor',
                'tab' => 'intro',
            ),
//            'age_req' => array(
//                'label' => '年龄要求补充',
//                'label_width' => 150,
//                'type' => 'xheditor',
//                'tab' => 'other',
//                'style' => 'width:100%; height:150px;',
//                'tip_front' => '年龄要求说明',
//            ),
            'application_notes' => array(
                'label' => '报名须知',
                'label_width' => 150,
                'type' => 'xheditor',
                'tab' => 'other',
                'style' => 'width:100%; height:150px;',
                'tip_front' => '报名须知信息说明',
            ),
            'cost_description' => array(
                'label' => '费用说明',
                'label_width' => 150,
                'type' => 'xheditor',
                'tab' => 'other',
                'style' => 'width:100%; height:150px;',
                'tip_front' => '相关费用说明信息',
            ),
            'notes' => array(
                'label' => '注意事项',
                'label_width' => 150,
                'type' => 'xheditor',
                'tab' => 'other',
                'tip_front' => '注意事项及需要准备手续等信息说明',
            ),
            'allow' => array(
                'label' => '是否审核',
                'label_width' => 150,
                'type' => 'bool',
                'tab' => 'base',
                'default' => '0',
                'close' => true,
                'offedit' => true,
            ),
            'departure_time' => array(
                'label' => '出发时间',
                'label_width' => 150,
                'type' => 'date',
                'close' => true,
            ),
            'itinerary' => array(
                'label' => '行程安排',
                'label_width' => 150,
                'type' => 'modelplug',
                'tab' => 'xinc',
                'close' => true,
                'htmlattr' => 'min-length=1',
                '@model_plug' => 'Itinerary',
            ),
            'stroke_note' => array(
                'label' => '日程备注',
                'label_width' => 150,
                'type' => 'xheditor',
                'tab' => 'xinc',
                'style' => 'width:100%; height:180px;',
                'tip_back' => '对日程安排后的额外补充说明，如要进行日程安排请回到列表页面进行操作。',
            ),
           
            
			/*'destination' => array(
                'label' => '国内目的地',
                'label_width' => 150,
                'type' => 'select',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_destination'),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择国内目的地',
                ),
                'header' => array(
                    0 => '',
                    1 => '选择国内目的地',
                ),
            ),*/
			
            'sort' => array(
                'label' => '权重值',
                'label_width' => 150,
                'type' => 'digits',
                'tab' => 'base',
                'default' => $this->getNextSort(),
                'close_html' => true,
                'offedit' => true,
                'tip_back' => '越大越靠前',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '权重值不能为空',
                    'digits' => '权重值必须是整数形式',
                ),
            ),
            'type' => array(
                'label' => '国内营，国际营',
                'tab' => 'base',
                'type' => 'text',
                'row_hide'=>true,
               
            ),
            //预上线产品信息
            'fate_min' => array(
                'label' => '为期天数',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
                'tab' => 'extend',
                'disabled'=>'true',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
            ),
            'fate_max' => array(
                'label' => '到',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
                'tab' => 'extend',
                'merge' => true,
                'merge_type' => '1',
                'disabled'=>'true',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
                'follow_text' => '天',
              
            ),
             'price_min' => array(
                'label' => '价格',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
                'tab' => 'extend',
                 'disabled'=>'true',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
            ),
            'price_max' => array(
                'label' => '到',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
                'tab' => 'extend',
                'disabled'=>'true',
                'merge' => true,
                'merge_type' => '1',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
                'follow_text' => '元',
              
            ),
             'remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
                'tab' => 'extend',
                'disabled'=>'true',
            ),
             'allow' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'hidden',
                'tab' => 'base',
                 'row_hide'=>TRUE,
            ),
             'rec' => array(
                'label' => '首页栏目封面推荐',
                'label_width' => 150,
                'type' => 'bool',
                'tab' => 'base',
                'tip_back' => '勾选后在首页的栏目中大图位置显示. 原来推荐的将自动取消。',
            ),
           
        );
    }

}
