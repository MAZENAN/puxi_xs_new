{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}国际营{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<style>
.smbox-list-content{ width:120%;}
</style>
{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get">
<a class="samao-link-btn" href="__SELF__/add">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
标题：{@form_text  name="title" model=$schmodel style="width:100px;"@}&nbsp;&nbsp;
营地国家：{@form_select onchange='this.form.submit();' name="camp_country" model=$schmodel@}&nbsp;&nbsp;
时间长短：{@form_select options=[[0,'选择时间长短'],[1,'1天'],[2,'2天'],[3,'3-5天'],[4,'6-8天'],[5,'9-14天'],[6,'15天及以上']] onchange='this.form.submit();' name="camp_days" model=$schmodel@}&nbsp;&nbsp;
是否亲子：{@form_select onchange='this.form.submit();' name="camp_type" model=$schmodel@}&nbsp;&nbsp;
供应商：{@form_select onchange='this.form.submit();' name="seller_id" model=$schmodel@}&nbsp;&nbsp;
是否上架：{@form_select options=[[0,'选择是否上架'],[1,'上架'],[2,'下架']] onchange='this.form.submit();'  name="allow" model=$schmodel@}&nbsp;&nbsp;
排序：{@form_select options=[[1,'正常排序'],[2,'点击量升序'],[3,'点击量降序'],[4,'费用升序'],[5,'费用降序'],[6,'订金升序'],[7,'订金降序'],[8,'截止日期升序'],[9,'截止日期降序'],[10,'修改时间升序'],[11,'修改时间降序']] onchange='this.form.submit();' name="order" model=$schmodel@}&nbsp;&nbsp;
<input type="hidden" name="type" value="{@$type@}" />
<input type="submit" value="查找" class="samao-mini-btn"/>
</form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="30">ID</th>
<th width="80">封面图片</th>
<th width="90">标题</th>
<th width="80">营地国家</th>
<th width="80">费用</th>
<th width="80">起始日期</th>
<th width="80">适合年龄</th>
<th width="80">修改时间</th>
<th width="80">BD</th>
<th width="80">供应商</th>
<th width="80">产品等级</th>
<th width="230">权重</th>
<th width="80">是否上架</th>
<th width="40">点击率</th>
<th width="190">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}12{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center"><img src="{@$rs.cover@}" height="50"/></td>
<td><a href="/glcamp-{@$rs.id@}.html" target="_blank">{@$rs.title@}</a></td>
<!-- <td align="center">{@$rs.camp_category|smval:'@pf_camp_category'@}</td> -->
<td align="center">{@$rs.camp_country|smval:'@pf_camp_country'@}</td>
<!-- <td align="center">{@$rs.camp_location@}</td> -->
<td align="center">￥{@$rs.ncost@}</td>
<td align="center">{@$rs.start@}</td>
<td align="center">{@$rs.agefrom@}-{@$rs.ageto@}岁</td>
<td align="center">{@if $rs.modifytime@}{@$rs.modifytime@}{@else@}{@$rs.addtime@}{@/if@}</td>
<td align="center">{@$rs.bd@}</td>
<td align="center"><a href="__APPROOT__/member/edit?id={@$rs.seller_id@}" >{@$rs.seller@}</a></td>
<td align="center">{@$rs.level@}</td>
<td align="center">{@$rs.sort|sortopt:$rs.id:1@}</td>
<td align="center">{@$rs.allow|way@}</td>
<td align="center">{@$rs.click@}</td>
<td align="right">
<a dialog="1" class="samao-link-minibtn" href="__APPROOT__/departure_date?campid={@$rs.id@}">出发日期</a>
<a dialog="1" class="samao-link-minibtn" href="__APPROOT__/schedule?campid={@$rs.id@}&pid=3">日程安排</a>
<a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==0@}上架{@else@}下架{@/if@}</a>
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
<a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
</form>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}