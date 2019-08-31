{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}会员列表{@/block@}
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/clipboard.min.js"></script>
{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
    <a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <form method="get">
        手机号：{@form_text  style="width:120px" name="mobile" model=$schmodel@}&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
    </form>
</div>
{@/block@}

<!--表头列-->

{@block name=table_ths@}
{@if $type==3@}
<style>
    .smbox-list-content{ width:100%;}
</style>
{@/if@}

<th width="80">ID</th>

<th width="80">昵称</th>
<th width="80">手机号码</th>
<th width="100">备注</th>
<th width="80">最近登陆</th>
<th width="240">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}6{@/block@}

<!--表行列-->
{@block name=table_tds@}
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.nickname@}</td>
<td align="center">{@$rs.mobile@}</td>
<td align="center">{@$rs.remark@}</td>

<td align="center">{@strtotime($rs.last_login_time)|date_format:'Y-m-d'@}</td>
<td align="center">
    <a onclick="return confirm('确定要删除该用户吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}