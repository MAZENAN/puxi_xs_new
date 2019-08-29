<!DOCTYPE html>
<html>
	<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>添加选项</title> 
	<link rel="stylesheet" type="text/css" href="/public/samaores/css/form.plane.css" />
     <style>
    ul.samao-box li { height: auto; margin: 5px; }
    ul.samao-box li label span{ color: #000; }
    </style>
	</head>
	<body>
		<script type="text/javascript" src="/public/samaores/js/jquery.js"></script> 
		<script type="text/javascript" src="/public/samaores/js/samao.validate.js"></script> 
		<script type="text/javascript">
		$('document').ready(function(){
		var index=0;
            window.parent.$('iframe').each(function(){
                var url=$(this).attr("src");
                if(url == "/admin/form"){           
                    var obj=$(this)[0].contentWindow;
                   obj.$(".form-tr").each(function(){
                   		var fid=$(this).attr("id");
                   		
                   		$("#id_"+fid).attr("checked","checked");
                   		
                   		obj.$(".form-tr").remove();
                   });

                } 
                index++;
             });
         

		$(".submit").live('click', function() {
			var html='';
			$(".check").each(function () {
        	if($(this).attr("checked") === 'checked'){
        		var id = $(this).val();
        		var sort = $(this).attr("sort");
        		var name = $(this).attr("name");
                        var pid  = $(this).attr("pid");
                var req = $(this).attr("req");
                var check='';
                var dis = '';
                var node_id = '';
                if(req == 1){
                    node_id = id;
                    check='checked';
                    dis ='disabled=disabled';
                }
                //alert(req);return;
        		var belong = $(this).attr("belong");
        		html += '<tr id="'+id+'" class="form-tr"><td class="form-td" align="center" valign="middle" >'+id+'<input type="hidden" name="id[]" value="'+id+'" /></td><td align="center" valign="middle">'+name+'</td><td align="center" valign="middle" >'+pid+'</td><td align="center" valign="middle"><input type="checkbox" '+dis+' name="required[]" value="'+id+'"'+check +'/><input type="hidden" name="node_id[]" value="'+node_id+'"  /></td><td align="center" valign="middle"><input type="hidden" name="sort[]" value="'+sort+'" style="width:50px" />'+sort+'</td><td  align="center" valign="middle"><a href="#" class="remove">删除</a></td></tr>';	
        	}
     	});
        var index=0;
            window.parent.$('iframe').each(function(){
                var url=$(this).attr("src");
                if(url == "/admin/form"){           
                    var obj=$(this)[0].contentWindow;
                    obj.$('#stulist').append(html);
        			window.close();

                } 
                index++;
             });
	});
});
</script>
<div style="display:none" id="h"></div>

		<div class="samao-body"> 
		<div class="form-title">
			添加选项
		</div> 

			<div class="samao-form"> 
                            {@foreach from=$rows item=rs key=key@}
                                <div class="form-box">
                                    <h2>{@$key|case:['0','1','2']:['学生信息','家长(会员)信息','其它信息']@}</h2>
                                    
                                       
                                    	 {@foreach from=$rs item=rsc key=keys@}
                                          <ul class="samao-box">
                                            <label class="keys">{@$keys@}:</label>
                                        <dt class="form-radio">
                                            {@foreach from=$rsc item=rss@}
                                            <li class="form-control">
                                                <label><input class="check" type="checkbox" name="{@$rss.name@}" value="{@$rss.id@}" pid="{@$keys@}" id="id_{@$rss.id@}" req={@$rss.required@} sort={@$rss.sort@} belong={@$rss.belong@}  {@if in_array($rss.id,$rss.node)@}disabled='disabled' {@/if@}/><span>{@$rss.name@}</span></label>
                                            </li> 
                                            {@/foreach@}
                                        </dt>
                                    </ul> {@/foreach@}
                                </div>
                                <div style="clear:both"></div> 
                            {@/foreach@}
				
			</div> 
			<div class="form-submit"> 
				<input type="button" class="submit" value="提交" /> 
				<input type="button" class="back" value="返回" onclick="javascript:(window.close())" /> 
				
			</div> 
		
	</div>
	</body>
</html>