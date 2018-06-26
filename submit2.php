<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>正在为您跳转到支付页面，请稍候...</title>
    <style type="text/css">
        body {margin:0;padding:0;}
        p {position:absolute;
            left:50%;top:50%;
            width:330px;height:30px;
            margin:-35px 0 0 -160px;
            padding:20px;font:bold 14px/30px "宋体", Arial;
            background:#f9fafc url(../images/loading.gif) no-repeat 20px 26px;
            text-indent:22px;border:1px solid #c5d0dc;}
        #waiting {font-family:Arial;}
    </style>
<script>
function open_without_referrer(link){
document.body.appendChild(document.createElement('iframe')).src='javascript:"<script>top.location.replace(\''+link+'\')<\/script>"';
}
</script>
</head>
<body>
<?php
require './includes/common.php';
require_once(SYSTEM_ROOT."muzhifu/muzhifu_config.php");
require_once(SYSTEM_ROOT."muzhifu/lib/muzhifu_submit.php");
@header('Content-Type: text/html; charset=UTF-8');
$type=daddslashes($_GET['type']);
$trade_no=daddslashes($_GET['trade_no']);
$row=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
if(!$row)exit('该订单号不存在，请返回来源地重新发起请求！');
	if($type=='alipay')$type='alipay.trade.precreate';//支付宝支付
	elseif($type=='qqpay')$type='qq.pay.native';//QQ支付
	elseif($type=='wxpay')$type='wxpay.pay.unifiedorder';//微信支付
	else $type='alipay.trade.precreate';//默认支付宝支付
$DB->query("update `pay_order` set `type` ='$type',`addtime` ='$date' where `trade_no`='$trade_no'");
	$http_to = $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
	$params =   [
	    'appid'        =>  $muzhifu_config['partner'],
	    'type'        =>  $type,
	    'addtime'     =>  date('Y-m-d H:i:s')
	];
	$params['mz_content'] = json_encode([
		'out_trade_no'	=>	$trade_no,
		'subject'		=>	$row['name'],
		'total_amount'	=>	$row['money'],
		"notify_url"	=> $http_to.$_SERVER['HTTP_HOST'].'/pay_notify.php',//异步通知不建议采用cdn
		"return_url"	=> $http_to.$_SERVER['HTTP_HOST'].'/pay_return.php'
	]);
	// 获得签名
	$sign = Muzhifu::sign($params, $muzhifu_config['key']);
	$params['sign'] = $sign;
	// 发送请求获得结果
	$http = Muzhifu::http($params);
    //print_r($http);
	$res = json_decode($http);
	if (!isset($res)) {
	    exit('出现问题：'.$http);
	
	}
if (isset($res->url)) {
    if ($res->type == '1') {
        echo $res->url;
    } else {
        header('Location: '.$res->url);
    }
} else {
    exit($res->msg);
}

?>
<p>正在为您跳转到支付页面，请稍候...</p>
</body>
</html>
