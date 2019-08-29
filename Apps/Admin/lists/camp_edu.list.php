<?php 

$type=SGet('type');
if ($type==1) {
    $title='成长课堂';
    $tags=DB::getopts('@pf_tag','id,title',0,'type=0 and pid=0');
    $tags_comm=DB::getopts('@pf_tag','id,title',0,'type=3 and pid=0');
}elseif ($type==3) {
    $title='媒体报道';
}elseif ($type==5) {
    $title='教育风向';
    $tags=DB::getopts('@pf_tag','id,title',0,'type=1 and pid=0');
    $tags_comm=DB::getopts('@pf_tag','id,title',0,'type=3 and pid=0');
}elseif ($type==6) {
    $title='课程体系';
    $tags_course=DB::getopts('@pf_tag','id,title',0,'type=2 and pid=0');
}elseif ($type==7) {
    $title='出营小贴士';
}elseif ($type==8) {
    $title='头篇文章';
}
$this->assign('title',$title);
$this->assign('tags',$tags);
$this->assign('tags_course',$tags_course);
$this->assign('tags_comm',$tags_comm);

return array (
  'model' => 'CampEdu',
  'search' => 
  array (
    0 => 
    array (
      'name' => 'title',
      'label' => '标题',
      'boxname' => 'title',
      'type' => 'text',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    1 => 
    array (
      'name' => '',
      'label' => '排序',
      'boxname' => 'order',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
   2 => 
    array (
      'name' => 'tag',
      'label' => '标签',
      'boxname' => 'tag',
      'type' => 'select',
      'options' => $tags,
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    3 => 
    array (
      'name' => 'tag_course',
      'label' => '课程体系标签',
      'boxname' => 'tag_course',
      'type' => 'select',
      'options' => $tags_course,
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    4 => 
    array (
      'name' => 'type',
      'label' => '分类',
      'boxname' => 'type',
      'type' => 'text',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    5 => 
    array (
      'name' => 'commend',
      'label' => '推荐到',
      'boxname' => 'commend',
      'type' => 'select',
      'schtp' => '0',
      'style' => '',
      'css' => '',
    ),
    6 => 
    array (
      'name' => 'tag_comm',
      'label' => '文章通用标签',
      'boxname' => 'tag_comm',
      'type' => 'select',
      'options' => $tags_comm,
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
  ),
  'usesql' => '0',
  'sql' => '',
  'sqlargs' => NULL,
  'usingfy' => '1',
  'orderby' => '',
);