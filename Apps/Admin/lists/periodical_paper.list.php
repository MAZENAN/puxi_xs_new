<?php

return array(
    'model' => 'PeriodicalPaper',
    'search' => array(
        array(
            'name' => 'document_id',
            'label' => '所属期刊文档',
            'boxname' => 'document_id',
            'type' => 'select',
            'schtp' => '1',
            'style' => '',
            'css' => '',
        ),

        array (
            'name' => 'title',
            'label' => '论文名',
            'boxname' => 'title',
            'type' => 'text',
            'schtp' => '0',
            'style' => 'width:120px',
            'css' => '',
        ),
    ),
    'usesql' => '0',
    'sql' => '',
    'sqlargs' => NULL,
    'usingfy' => '1',
    'orderby' => 'id desc',
);