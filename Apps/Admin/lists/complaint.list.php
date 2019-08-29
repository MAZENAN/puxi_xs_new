<?php

return array(
    'model' => 'Complaint',
    'search' =>array(
       array(
            'name' => 'state',
            'label' => '是否处理筛选',
            'boxname' => 'state',
            'type' => 'select',
            'schtp' => '9',
            'style' => '',
            'css' => '',
        ),
        array(
            'name' => 'title',
            'label' => '标题',
            'boxname' => 'title',
            'type' => 'text',
            'schtp' => '9',
            'style' => '',
            'css' => '',
        ),
    ),
    'usesql' => '0',
    'sql' => '',
    'sqlargs' => NULL,
    'usingfy' => '1',
    'orderby' => 'add_time desc',
);
