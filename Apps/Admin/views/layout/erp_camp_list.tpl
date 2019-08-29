{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}分销商产品{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>

{@/block@}

<!--表格顶部区域-->

{@block name=table_topbar@}
{@/block@}


<!--表头列-->
{@block name=table_ths@}
<th width="20">ID</th>
<th width="60">封面图片</th>
<th width="200">标题</th>
<th width="60">目的地</th>
<th width="60">费用</th>
<th width="60">起始日期</th>
<th width="60">适合年龄</th>
<th width="60">销量</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}11{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center"><img src="{@$rs.cover|minimg:79:50:1@}" height="50" width="79"/></td>
<td><a href="/{@if $rs.type =='0'@}cncamp{@elseif $rs.type=='1'@}glcamp{@/if@}-{@$rs.id@}.html" target="_blank">{@$rs.title@}</a></td>
{@if $rs.type == '0'@}<td align="center">{@$rs.destination|smval:'@pf_destination'@}</td>{@elseif $rs.type == '1'@}<td align="center">{@$rs.camp_country|smval:'@pf_camp_country'@}</td>{@/if@}
<td align="center">￥{@$rs.ncost@}</td>
<td align="center">{@$rs.start@}</td>
<td align="center">{@$rs.agefrom@}-{@$rs.ageto@}岁</td>
<td align="center">{@$rs.num|default:0@}</td>
</form>

{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}