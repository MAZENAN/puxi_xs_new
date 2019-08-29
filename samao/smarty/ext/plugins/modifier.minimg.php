<?php
Config::load('upload');
function smarty_modifier_minimg($string, $width, $height, $mode = 3) {
    return C('aliyunOss')['get_domain'].$string;
}
