<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/7
 * Time: 11:03
 */

function cache_config($key, $default = null)
{
    $config = SgConfig::getConfigFromCache($key);
    return empty($config) ? $default : $config->value;
}
/**
 * @param $var
 * @param bool $echo
 * @param null $label
 * @param bool $strict
 * @return mixed|null|string
 */
function mydump($var, $echo = true, $label = null, $strict = true)
{
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
//        ob_end_clean();
    }
    if ($echo) {
        echo($output);
        return null;
    } else
        return $output;
}
/**
 * 生成随机数
 * @param int $length 默认长度为32
 * @parma int $mode 1小写，2大写，3数字　4混合
 * @return string
 */
function getNonce($length = 32, $mode = 4)
{
    $chars = '';
    switch ($mode) {
        case 1:
            $chars = 'abcdefghijklmopqrstuvwxyz';
            break;
        case 2:
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 3:
            $chars = '0123456789';
            break;
        default:
            $chars = 'abcdefghijklmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            break;
    }
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $str;
}