<?php

return [
    /* 路由规则选项 */
    'ROUTE_DATAS' => [
        'rule' => [
            'cid' => '/{ctl:@key}/{act:@key}/{id:@num}.html', //可以任意取名
            'act' => '/{ctl:@key}/{act:@key}.html', //控制器路径 一定需要使用 act 的名称 
            'ctl' => '/{ctl:@key}.html', //控制器路径 一定需要使用 ctl 的名称 
        ],
        'default' => ['ctl' => 'index', 'act' => 'index'],
    ],
    'PageBar' => array(
        'info' => '共有信息：#Count#  页次：#Page#/#PageCount# 每页 #PageSize#', //分页信息
        'showinfo' => 0, //1为显示 0 为不显示
        'infoclass' => 'pagebar_info', //控件信息样式
        'size' => 10, //分页控件上 显示多少页
        'showfirst' => 2, //首页按钮显示  可选值 1|2|0 为0时不显示 1 和 2 值为不同显示方式
        'showlast' => 2, //尾页按钮显示   可选值 1|2|0 为0时不显示 1 和 2 值为不同显示方式
        'showprev' => 2, //上页按钮显示 可选值 1|2|0 为0时不显示 1为默认显示 2 为强制显示
        'shownext' => 2, //下页按钮显示 可选值 1|2|0 为0时不显示 1为默认显示 2 为强制显示
        'shownbpage' => 1, //页码按钮显示  可选值 1|0 为0时不显示 1为显示 
        'first' => '首页', //按钮文本
        'prev' => '上页', //按钮文本
        'next' => '下页', //按钮文本
        'last' => '尾页', //按钮文本
        'class' => 'pagebar', //控件样式
    ),
];
