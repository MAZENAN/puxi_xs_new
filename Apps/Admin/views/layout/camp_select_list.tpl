{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}{@$title@}{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" >
    $('.price-select').live('change',function(){
                var that=$(this);
                var bid=that.data('bindid');
                var pem=$('#'+bid);
                var val=that.val();
                if(val){
                    pem.html('<b>￥'+val+'</b>元');
                }else{
                    pem.html('<b>&nbsp;&nbsp;--&nbsp;&nbsp;</b>');
                }
            });
	$(".get_camp").live('click', function() {
		var id=$(this).attr('rel_id');
		var title=$(this).attr('rel_title');
        var mechanism=$(this).attr('rel_mechanism');
        var departure_time="";
        var price="";
        var tourists="";
        var parent="";
        var date_id="";
        $(".price-select").each(function () {
             if($(this).attr("data-bindid")=="price_"+id){
                var camp_date=$(this).find("option:selected");
                departure_time=camp_date.attr("rel_date");
                price=camp_date.val();
                tourists=camp_date.attr("rel_tourists");
                parent=camp_date.attr("rel_parent");
                date_id=camp_date.attr("rel_date_id");
             } 
         });
        var index=0;
            window.parent.$('iframe').each(function(){
                var url=$(this).attr("src");
                var patt = new RegExp("/admin/member");
                var patt2 = new RegExp("/admin/client");
                if(patt.test(url) || patt2.test(url)){            
                    var obj=$(this)[0].contentWindow;
                    obj.$('#campid').val(id);
                    obj.$('#title').html(title);
                    obj.$(".field-title").html("");
                    obj.$('#mechanism').html(mechanism);
                    obj.$('#departure_option').html(departure_time);
                    obj.$('#price').html( price);
                    obj.$('#need_topay').val(price);
                    obj.$('#tourists').html("小："+tourists);
                    obj.$('#tourists').attr('data-val', tourists);
                    obj.$('#parent').html("大："+parent);
                    obj.$('#parent').attr('data-val', parent);
                    obj.$('#shuliang').val(1);
                    obj.$('#date_id').val(date_id);
                    window.close();
                } 
                index++;
            });
	});
   
    
</script>


{@/block@}

<!--表格顶部区域-->

{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get" class="search">
{@form_text  name="title" model=$schmodel  class="form-control text"@}&nbsp;&nbsp;
<input type="hidden" name="type" value="{@$type@}" />
<input type="hidden" name="istop" value="{@$istop@}" />
<input type="hidden" name="state" value="{@$state@}" />
<input type="hidden" name="client" value="1" />
<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
</form>
</div>
{@/block@}


<!--表头列-->
{@block name=table_ths@}

<th width="47%">标题</th>
<th width="35%">出发选项</th>
<th width="10%">单价</th>
<th width="8%">选择</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}11{@/block@}

<!--表行列-->
{@block name=table_tds@}

<td style="padding-left:15px;">
    <a href="/{@if $rs.type =='0'@}cncamp{@elseif $rs.type=='1'@}glcamp{@/if@}-{@$rs.id@}.html" target="_blank">{@$rs.title@}
</td>
<td>
    <select  class="form-control select price-select" data-bindid="price_{@$rs.id@}">
        {@$select=true@}
        {@foreach from=$rs.times item=drs@}
            <option value="{@$drs.cost@}" data-allow="{@$drs.allow@}" rel_date="{@{@Comm::formatCampDate($drs)@}@}" rel_tourists="{@$drs.tourists@}" rel_parent="{@$drs.parent@}" rel_date_id="{@$drs.id@}" {@if $drs.cost==$rs.ncost&&$select==true@}{@$select=false@}selected{@/if@}>{@Comm::formatCampDate($drs)@}{@if $drs.allow==0@}(已截止){@/if@}</option>
        {@foreachelse@}
            <option value="">暂未安排行程时间</option>
        {@/foreach@}
    </select>
</td>
<td align="center"><span id="price_{@$rs.id@}" class="org">{@if $rs.ncost@}<b>￥{@$rs.ncost@}</b>元{@else@}<b>&nbsp;&nbsp;--&nbsp;&nbsp;</b>{@/if@}</span></a></td>
<td align="center" style=" position:relative">{@if $drs.allow==1@}<a class="samao-link-btn get_camp" href="javascript:void(0);" rel_id="{@$rs.id@}"  rel_title="{@$rs.title@}"  rel_mechanism="{@$rs.mechanism@}" >选择</a>{@else@}不可选{@/if@}</td>

{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}