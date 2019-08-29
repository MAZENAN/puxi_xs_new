{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}{@$title@}{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
{@if $type!=8@}
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add?type={@$type@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
{@form_text  name="title" placeholder="文章标题" model=$schmodel@}&nbsp;&nbsp;
<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>&nbsp;&nbsp;
{@if $tags@}
{@form_select  style="width:80px" header="选择标签"  onchange='this.form.submit();'  name="tag" model=$schmodel@}&nbsp;&nbsp;
{@/if@}
{@if $tags_comm@}
{@form_select   header="选择文章通用标签"  onchange='this.form.submit();'  name="tag_comm" model=$schmodel@}&nbsp;&nbsp;
{@/if@}
{@if $type==6@}{@form_select   header="选择推荐列表"  onchange='this.form.submit();'  options=[['"1"','阅读无公害'],['"2"','趣味阅读']] name="commend" model=$schmodel@}&nbsp;&nbsp;{@/if@}
{@if $tags_course@}
{@form_select   header="选择课程体系标签"  onchange='this.form.submit();'  name="tag_course" model=$schmodel@}&nbsp;&nbsp;
{@/if@}

{@form_select options=[[1,'正常排序'],[2,'点击量升序'],[3,'点击量降序'],[4,'发布日期升序'],[5,'发布日期降序']] onchange='this.form.submit();' name="order" model=$schmodel@}
{@/if@}
<input type="hidden" name="type" value="{@$type@}">
</form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
{@if $type==8@}
<th width="180">课程体系</th>
<th>文章标题</th>
{@else@}

<th width="60">ID</th>
{@if $type!=7@}<th width="110">图片</th>{@/if@}
<th>标题</th>
<th width="180">权重排序</th>
{@if $tags||$tags_course@}<th width="80">标签</th>{@/if@}
<th width="80">是否上架</th>

{@/if@}
<th width="150">操作</th>
{@/block@}


<!--总列数合并单元格时可用-->
{@block name=colspan@}8{@/block@}

<!--表行列-->
{@block name=table_tds@}
{@if $type==8@}
<td align="center">{@$rs.title@}</td>
<td align="center">{@$rs.article@}</td>
<td align="center">
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.article_id@}&type=8&is_top={@$rs.id@}">编辑</a>
</td>
{@else@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
{@if $type!=7@}<td align="center"><img src="{@$rs.mobile_img|minimg:70:50:1@}" height="50" width="70"/></td>{@/if@}

<td><a  href="/campedu-{@$rs.id@}.html" target="_blank">{@$rs.title@}</a></td>
<td align="center">{@$rs.sort|sortopt:$rs.id:1@}</td>
{@if $tags||$tags_course@}<td align="center">{@$rs.tag_title@}</td>{@/if@}
<td align="center">{@$rs.allow|way@}</td>
<td align="center">
<a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==0@}上架{@else@}下架{@/if@}</a>
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}&type={@$rs.type@}">编辑</a>
<a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
</form>
{@/if@}
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}
