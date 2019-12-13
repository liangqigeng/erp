<?php
/**
 * Created by PhpStorm.
 * User: leo2019
 * Date: 2019/12/9
 * Time: 15:32
 */
    //公共函数

    //打印函数
    function p($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

/**
 *
 * 字符截取
 * @param string $string  需要截取的字符串
 * @param int 	 $start	  截取的开始位置
 * @param int 	 $length  截取的长度
 * @param string $charset 编码
 * @param string $dot	  如果截取的长度小于总长度就加这个字符
 */
function str_cut(&$string, $start, $length, $charset = "utf-8", $dot = '……') {
    $tmpstr = '';
    if(function_exists('mb_substr')) {
        if(mb_strlen($string, $charset) > $length) {
            return mb_substr ($string, $start, $length, $charset) . $dot;
        }
        return mb_substr ($string, $start, $length, $charset);
    }else if(function_exists('iconv_substr')) {
        if(iconv_strlen($string, $charset) > $length) {
            return iconv_substr($string, $start, $length, $charset) . $dot;
        }
        return iconv_substr($string, $start, $length, $charset);
    }
    $charset = strtolower($charset);
    switch ($charset) {
        case "utf-8" :
            preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $ar);
            if(func_num_args() >= 3) {
                if (count($ar[0]) > $length) {
                    return join("", array_slice($ar[0], $start, $length)) . $dot;
                }
                return join("", array_slice($ar[0], $start, $length));
            } else {
                return join("", array_slice($ar[0], $start));
            }
            break;
        default:
            $start = $start * 2;
            $length   = $length * 2;
            $strlen = strlen($string);
            for ( $i = 0; $i < $strlen; $i++ ) {
                if ( $i >= $start && $i < ( $start + $length ) ) {
                    if ( ord(substr($string, $i, 1)) > 129 ) {
                        $tmpstr .= substr($string, $i, 2);
                    }

                    else $tmpstr .= substr($string, $i, 1);
                }
                if ( ord(substr($string, $i, 1)) > 129 ) $i++;
            }
            if ( strlen($tmpstr) < $strlen ) $tmpstr .= $dot;

            return $tmpstr;
    }
}
