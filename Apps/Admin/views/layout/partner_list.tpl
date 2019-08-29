{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}合作伙伴{@/block@}

<!--头部标签区-->
{@block name=toptags@}
<div class="smbox-toptags"><a href="?" {@if empty($sch.type)@}class="active"{@/if@}>所有信息</a><a href="?type=1" {@if $sch.type ==1@}class="active"{@/if@}>友情链接</a><a href="?type=2" {@if $sch.type ==2@}class="active"{@/if@}>合作支持</a></div>
{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get">
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增链接</a>&nbsp;&nbsp;&nbsp;&nbsp;
{@form_hidden  name="type" model=$schmodel@}&nbsp;&nbsp;
</form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="80">ID</th>
<th width="80">类型</th>
<th>名称</th>
<th width="230">链接地址</th>
<th width="230">排序</th>
<th width="180">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}6{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.type|case:1:'友情链接':'合作支持'@}</td>
<td align="center">{@$rs.name@}</td>
<td align="center">{@$rs.url@}</td>
<td align="center">{@$rs.sort|sortopt:$rs.id@}</td>
<td align="center">
<a class="samao-link-minibtn" href="__SELF__/edit?type={@$smarty.get.type@}&id={@$rs.id@}">编辑</a>
<a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?type={@$smarty.get.type@}&id={@$rs.id@}">删除</a>
</td>
</form>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}