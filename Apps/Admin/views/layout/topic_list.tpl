{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}专题列表{@/block@}
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/clipboard.min.js"></script>
<style>
.one_word{ padding: 15px 20px; border-bottom: 1px solid #d5d7dc;  }
.one_word input.text{ width: 200px; height: 24px; border:1px solid #d5d7dc; padding-left: 5px; margin-left: 5px; }
.one_word .samao-mini-btn{ background:#0090b4; color: #fff; cursor: pointer; }
.one_word .samao-mini-btn:hover{ background: #00a2ca;  }
</style>
{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="one_word">
    <form method="get" action="__SELF__/save">
        首页一句话：<input type="text" class="text" name="sentence" value="{@$sentence@}" /> <input type="submit" value="保存配置" class="samao-mini-btn"/>
    </form>
    
</div>
<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增专题</a>&nbsp;&nbsp;&nbsp;&nbsp;

</div>
{@/block@}

<!--表头列-->

{@block name=table_ths@}
<th width="80">专题ID</th>
<th width="80">专题名称</th>
<th width="60">上线时间</th>
<th width="80">排序</th>
<th width="80">状态</th>
<th width="240">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}6{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.name@}</td>
<td align="center">{@if $rs.allow==1@}{@$rs.uptime@}{@/if@}</td>
<td align="center">{@$rs.sort|sortopt:$rs.id:1@}</td>
<td align="center">{@$rs.allow|way@}</td>
<td align="center">
    <div id="copy{@$rs.id@}" class="theme-address" style="font-size:0px;height:0;">m.{@$url@}/topic/index/{@$rs.id@}.html</div>
<a class="copyaddress_{@$rs.id@} samao-link-minibtn" type="button" data-clipboard-action="copy" data-clipboard-target="#copy{@$rs.id@}">复制专题链接</a>
<a dialog="1" class="samao-link-minibtn" href="__SELF__/category?id={@$rs.id@}">分类</a>
<a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==0@}上架{@else@}下架{@/if@}</a>
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
<a onclick="return confirm('确定要删除该用户吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>

</td>
</form>
<script>
var clipboard = new Clipboard('.copyaddress_{@$rs.id@}');
clipboard.on('success', function(e) {
  alert("地址已复制到剪贴板中");
  console.log(e);
});

clipboard.on('error', function(e) {
  console.log(e);
});
</script>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}