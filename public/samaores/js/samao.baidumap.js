(function($,undefined){var BaiduMap=function(obj,options){var box=$(obj);var boxfor=null;var span=$('<span style="color:#F00;"></span>').text(box.val()).insertBefore(box);$('<a style="margin-left:10px;" class="samao-link-btn" href="#">拾取坐标</a>').insertBefore(box).click(function(){var url='';if(options&&options.input!=undefined){boxfor=$(options.input);url+='?address='+encodeURIComponent(boxfor.val())+'&city='+encodeURIComponent(boxfor.val());}
if(box.val()!=''){url+=url==''?'?':'&';url+='point='+box.val();}
url='/service/baidumap.php'+url;var val=box.val();window.opDialog(url,'baidumap','拾取坐标',function(ret){span.text(ret);box.val(ret);},{height:520,width:700});return false;});};$.fn.initBaiduMap=function(options){this.each(function(){if(!this.initBaiduMap){var Box=new BaiduMap(this,options);this.initBaiduMap=Box;}
else{if(typeof(options)=='string'){if(options=='close'){this.initBaiduMap.BoxClose();this.initBaiduMap=null;}}}});};})(jQuery);