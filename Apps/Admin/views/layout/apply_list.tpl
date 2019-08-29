{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}{@if $state == '0'@}未审核列表{@else@}分销商提现列表{@/if@}{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
手机号：{@form_text  style="width:120px" name="mobile" model=$schmodel@}&nbsp;&nbsp;
<input type="hidden" name="state" value="{@$state@}" />
<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>

</form>
</div>
{@/block@}
 
<!--表头列-->
{@block name=table_ths@}
<th width="30">ID</th>
<th width="80">用户名</th>
<th width="90">提现金额</th>
<!-- <th width="80">项目主题</th> -->
<th width="120">申请时间</th>
<th width="120">处理时间</th>
<th width="50">状态</th>
<th width="60">失败原因</th>
<th width="80">真实姓名</th>
<th width="80">开户行</th>
<th width="180">开户账号</th>
<th width="80">操作</th>
<!-- <th width="190">操作</th> -->
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}11{@/block@}

<!--表行列-->
{@block name=table_tds@}
<!-- <form method="post"> -->
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.mobile@}</td>
<td align="center">{@$rs.money@}</td>
<!-- <td align="center">{@$rs.theme|smval:'@pf_theme'@}</td> -->
<td align="center">{@$rs.applytime@}</td>
<td align="center">{@$rs.dealtime@}</td>
<td align="center">{@if $rs.state=='0'@}申请中{@elseif $rs.state=='1'@}已通过{@elseif $rs.state=='2'@}申请失败{@/if@}</td>
<td align="center">{@$rs.failmark@}</td>
<td align="center">{@$rs.realname@}</td>
<td align="center">{@$rs.bankname@}</td>
<td align="center">{@$rs.bankcard@}</td>

<td  align="center">
{@if $rs.state=='0'@}<a class="samao-link-minibtn" href="__SELF__/audit?id={@$rs.id@}">审核</a>{@/if@}
</td>
<!-- </form> -->
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}