<?php
//error_reporting(E_ALL); ini_set("display_errors", 1);
//error_reporting(0);
error_reporting(E_ALL);
define('CACHE_FILE', 0);
header("content-type:text/html;charset=utf-8");
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
date_default_timezone_set('Asia/Shanghai');
$date = date("Y-m-d H:i:s");

session_start();

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';

if(is_file(SYSTEM_ROOT.'360safe/360webscan.php')){//360网站卫士
    require_once(SYSTEM_ROOT.'360safe/360webscan.php');
}
if(!is_file(SYSTEM_ROOT.'config.php')){
    exit("网站还未安装，请访问/install进行安装！");
}
require SYSTEM_ROOT.'config.php';
try {
    $DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);
}catch(Exception $e){
    exit('链接数据库失败:'.$e->getMessage());
}
$DB->exec("set names utf8");
$DB->query('select * from pay_config where 1')->fetch();
include(SYSTEM_ROOT . 'cache.class.php');
$CACHE = new CACHE();
$conf = unserialize($CACHE->read());
if (empty($conf['web_name'])) {
    $conf = $CACHE->update();
}

if(!$conf['local_domain'])$conf['local_domain']=$_SERVER['HTTP_HOST'];
$password_hash='!@#%!s!0';
include_once(SYSTEM_ROOT."function.php");
include_once(SYSTEM_ROOT."member.php");
include_once(SYSTEM_ROOT.'mzf_config.php');
include_once(SYSTEM_ROOT.'version.php');
include_once(SYSTEM_ROOT."muzhifu/lib/muzhifu_core.function.php");
include_once(SYSTEM_ROOT."muzhifu/lib/muzhifu_md5.function.php");
?>