<?php
/* *
 * 配置文件
 */

//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//申请地址www.muzhifu.com
//商户ID
$muzhifu_config['partner']		= '1000';//从拇指付平台获取的APPID

//商户KEY
$muzhifu_config['key']			= '590cccc6d24a8e3101ba06be324e0181';//从拇指付平台获取的APPKEY


//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

//签名方式 不需修改
$muzhifu_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
$muzhifu_config['input_charset']= strtolower('utf-8');

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$muzhifu_config['transport']    = 'http';
?>