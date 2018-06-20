<?php
error_reporting(0);

@header('Content-Type: text/html; charset=UTF-8');
$do=isset($_GET['do'])?$_GET['do']:'0';
if(file_exists('install.lock')){
	$installed=true;
	$do='0';
}

function checkfunc($f,$m = false) {
	if (function_exists($f)) {
		return '<font color="green">可用</font>';
	} else {
		if ($m == false) {
			return '<font color="black">不支持</font>';
		} else {
			return '<font color="red">不支持</font>';
		}
	}
}

function checkclass($f,$m = false) {
	if (class_exists($f)) {
		return '<font color="green">可用</font>';
	} else {
		if ($m == false) {
			return '<font color="black">不支持</font>';
		} else {
			return '<font color="red">不支持</font>';
		}
	}
}

?>


<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no,minimal-ui">
<title>安装程序 - 拇指付易支付系统</title>
<link href="http://www.hbbyd.cn/assets/css/magic-check.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://css.letvcdn.com/lc04_yinyue/201612/19/20/00/bootstrap.min.css">
  

</head>
<body>
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <span class="navbar-brand">拇指付易支付系统</span>
      </div>
    </div>
  </nav>
  <div class="container" style="padding-top:60px;">
    <div class="col-xs-12 col-sm-8 col-lg-6 center-block" style="float: none;">

<?php if($do=='0'){?>
<div class="panel panel-primary">
	<div class="panel-heading" style="background: #15A638;">
		<h3 class="panel-title" align="center">安装说明</h3>
	</div>
	<div class="panel-body">
		<p><iframe src="../readme.txt" style="width:100%;height:465px;"></iframe></p>
		<?php if($installed){ ?>
		<div class="alert alert-warning">您已经安装过，如需重新安装请删除<font color=red> install/install.lock </font>文件后再安装！</div>
		<?php }else{?>
		<p align="center"><a class="btn btn-primary" href="index.php?do=1">开始安装</a></p>
       <p align="center"><a class="btn btn-primary" href="https://muzhifu.cc/">申请商户</a></p>
		<?php }?>
	</div>
</div>

<?php }elseif($do=='1'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">环境检查</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
	<span class="sr-only">10%</span>
  </div>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:20%">函数检测</th>
			<th style="width:15%">需求</th>
			<th style="width:15%">当前</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>PHP 5.2+</td>
			<td>必须</td>
			<td><?php echo phpversion(); ?></td>
		</tr>
		<tr>
			<td>curl_exec()</td>
			<td>必须</td>
			<td><?php echo checkfunc('curl_exec',true); ?></td>
		</tr>
		<tr>
			<td>file_get_contents()</td>
			<td>必须</td>
			<td><?php echo checkfunc('file_get_contents',true); ?></td>
		</tr>
	</tbody>
</table>
<p><span><a class="btn btn-primary" href="index.php?do=0">上一步</a></span>
<span style="float:right"><a class="btn btn-primary" href="index.php?do=2" align="right">下一步</a></span></p>
</div>

<?php }elseif($do=='2'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">数据库配置</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
	<span class="sr-only">30%</span>
  </div>
</div>
	<div class="panel-body">
	<?php
echo <<<HTML
		<form action="?do=3" class="form-sign" method="post">
		<label for="name">数据库地址:</label>
		<input type="text" class="form-control" name="db_host" value="localhost">
		<label for="name">数据库端口:</label>
		<input type="text" class="form-control" name="db_port" value="3306">
		<label for="name">数据库用户名:</label>
		<input type="text" class="form-control" name="db_user">
		<label for="name">数据库密码:</label>
		<input type="text" class="form-control" name="db_pwd">
		<label for="name">数据库名:</label>
		<input type="text" class="form-control" name="db_name">
		<br><input type="submit" class="btn btn-primary btn-block" name="submit" value="保存配置">
		</form><br/>
		（如果已事先填写好config.php相关数据库配置，请 <a href="?do=3&jump=1">点击此处</a> 跳过这一步！）
HTML;
?>
	</div>
</div>

<?php }elseif($do=='3'){
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">保存数据库</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
	<span class="sr-only">50%</span>
  </div>
</div>
	<div class="panel-body">
<?php
require './db.class.php';

	$db_host=isset($_POST['db_host'])?$_POST['db_host']:NULL;
	$db_port=isset($_POST['db_port'])?$_POST['db_port']:NULL;
	$db_user=isset($_POST['db_user'])?$_POST['db_user']:NULL;
	$db_pwd=isset($_POST['db_pwd'])?$_POST['db_pwd']:NULL;
	$db_name=isset($_POST['db_name'])?$_POST['db_name']:NULL;

	if($db_host==null || $db_port==null || $db_user==null || $db_pwd==null || $db_name==null){
		echo '<div class="alert alert-danger">保存错误,请确保每项都不为空<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
	} else {
		$config="<?php
/*数据库配置*/
\$dbconfig=array(
	'host' => '{$db_host}', //数据库服务器
	'port' => {$db_port}, //数据库端口
	'user' => '{$db_user}', //数据库用户名
	'pwd' => '{$db_pwd}', //数据库密码
	'dbname' => '{$db_name}' //数据库名
);

/*网站配置*/
\$conf=array(
	'admin_user' => 'admin', //管理员用户名
	'admin_pwd' => 'admin', //管理员密码
	'local_domain' => 'localhost', //本站URL最好不开CDN

	/*结算转账信息设置*/
	'wxtransfer_desc' => '拇指付支付自动结算', //微信企业付款 付款说明
	'payer_show_name' => '拇指付易支付', //单笔转账到支付宝接口 付款方显示姓名
	'alipay_appid' => 'appid', //支付宝应用APPID

	/*支付及结算费率设置*/
	'money_rate' => 97, //默认支付分成比例（百分数）
	'settle_money' => 30, //每天满多少元自动结算
	'settle_rate' => 0.005,  //结算费率
	'settle_fee_min' => 0.1,  //结算手续费最小
	'settle_fee_max' => 20,  //结算手续费最大
	'settle_open' => 0,  //是否开启用户中心手动申请结算

	/*用户中心配置*/
	'web_name' => '拇指付易支付', //网站名称
	'web_qq' => '7019732', //客服QQ
	'quicklogin' => 0, //快捷登录设置（1为支付宝快捷登录，2为QQ快捷登录）

	/*申请商户配置*/
	'is_reg' => 1, //是否开放自助申请商户
	'is_payreg' => 0, //是否付费申请
	'reg_pid' => '1000', //付费申请收款商户ID
	'reg_price' => '48', //商户申请价格
	'verifytype' => 1, //0为邮箱验证，1为手机验证
	'stype_1' => 1, //是否开启支付宝结算
	'stype_2' => 1, //是否开启微信结算
	'stype_3' => 0, //是否开启QQ钱包结算
	'stype_4' => 1, //是否开启银行卡结算

	/*发信邮箱配置*/
	'mail_cloud' => 0, //0为使用SMTP发信，1为使用sendcloud
	'mail_smtp' => 'smtp.qq.com', //SMTP地址
	'mail_port' => 465, //SMTP端口
	'mail_name' => '7019732@qq.com', //邮箱账号
	'mail_pwd' => '123456', //邮箱密码（授权码）
	'mail_apiuser' => '', //sendcloud API_USER
	'mail_apikey' => '', //sendcloud API_KEY

	/*短信验证码配置*/
	'sms_uid' => '', //api.smszx.cn 页面查看
    'sms_token' => '', //api.smszx.cn 页面查看
    
	/*Geetest极限验证码配置*/
	'CAPTCHA_ID' => 'b31335edde91b2f98dacd393f6ae6de8',
	'PRIVATE_KEY' => '170d2349acef92b7396c7157eb9d8f47',

);

?>";
		if(!$con=DB::connect($db_host,$db_user,$db_pwd,$db_name,$db_port)){
			if(DB::connect_errno()==2002)
				echo '<div class="alert alert-warning">连接数据库失败，数据库地址填写错误！</div>';
			elseif(DB::connect_errno()==1045)
				echo '<div class="alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！</div>';
			elseif(DB::connect_errno()==1049)
				echo '<div class="alert alert-warning">连接数据库失败，数据库名不存在！</div>';
			else
				echo '<div class="alert alert-warning">连接数据库失败，['.DB::connect_errno().']'.DB::connect_error().'</div>';
		}elseif(file_put_contents('../includes/config.php',$config)){
			echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
			if(DB::query("select * from pay_user where 1")==FALSE)
				echo '<p align="right"><a class="btn btn-primary btn-block" href="?do=4">创建数据表>></a></p>';
			else
				echo '<div class="list-group-item list-group-item-info">系统检测到你已安装过拇指付易支付系统</div>
				<div class="list-group-item">
					<a href="?do=5" class="btn btn-block btn-info">跳过安装</a>
				</div>
				<div class="list-group-item">
					<a href="?do=4" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}" class="btn btn-block btn-warning">强制全新安装</a>
				</div>';
		}else{
		echo '<div class="alert alert-danger">保存失败，请确保网站根目录有写入权限<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
		}
	}

?>
	</div>
</div>
<?php }elseif($do=='4'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">创建数据表</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
	<span class="sr-only">70%</span>
  </div>
</div>
	<div class="panel-body">
<?php
include_once '../includes/config.php';
if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']) {
	echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
} else {
	require './db.class.php';
	$sql=file_get_contents("install.sql");
	$sql=explode(';',$sql);
	$cn = DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
	if (!$cn) die('err:'.DB::connect_error());
	DB::query("set sql_mode = ''");
	DB::query("set names utf8");
	$t=0; $e=0; $error='';
	for($i=0;$i<count($sql);$i++) {
		if ($sql[$i]=='')continue;
		if(DB::query($sql[$i])) {
			++$t;
		} else {
			++$e;
			$error.=DB::error().'<br/>';
		}
	}
}
if($e==0) {
	echo '<div class="alert alert-success">安装成功！<br/>SQL成功'.$t.'句/失败'.$e.'句</div><p align="right"><a class="btn btn-block btn-primary" href="index.php?do=5">下一步>></a></p>';
} else {
	echo '<div class="alert alert-danger">安装失败<br/>SQL成功'.$t.'句/失败'.$e.'句<br/>错误信息：'.$error.'</div><p align="right"><a class="btn btn-block btn-primary" href="index.php?do=4">点此进行重试</a></p>';
}
?>
	</div>
</div>

<?php }elseif($do=='5'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">对接易支付</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	<span class="sr-only">100%</span>
  </div>
</div>
	<div class="panel-body">
	<div class="text-danger wrapper text-center" id="parsley-id"></div>
<?php
	$url = 'http://'.$_SERVER['SERVER_NAME'];
	$json = json_decode(file_get_contents("../includes/json.txt"),true);
	echo <<<HTML
		<label for="name">当前网址域名(一般默认):</label>
		<input type="text" class="form-control" id="domain" value="{$url}">
		<label for="name">拇指付用户ID:</label>
		<input type="text" class="form-control" id="id" value="{$json['id']}">
		<label for="name">拇指付access_token:</label>
		<input type="text" class="form-control" id="access_token" value="{$json['access_token']}">
		<br><input type="submit" class="btn btn-primary btn-block" onclick="connect()" value="远程连接"><br/>
HTML;


?>

	</div>
</div>

<?php }elseif($do=='6'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">对接易支付</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	<span class="sr-only">100%</span>
  </div>
</div>
	<div class="panel-body">
	<div class="text-danger wrapper text-center" id="parsley-id"></div>
<?php

function Get($url,$data = null){  
    $curl = curl_init();  
    curl_setopt($curl, CURLOPT_URL, $url);  
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);    
    if(!empty($data)){  
        curl_setopt($curl,CURLOPT_POST,1);  
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);  
    }  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
    $output = curl_exec($curl);  
    curl_close($curl);  
    return $output;   
}  

	$domain=isset($_POST['domain'])?$_POST['domain']:$_GET['domain'];
	$id=isset($_POST['id'])?$_POST['id']:$_GET['id'];
	$access_token=isset($_POST['access_token'])?$_POST['access_token']:$_GET['access_token'];
	$http = 'https://api.muzhifu.cc/Yizf/getzt.php?id='.$id.'&domain='.$domain.'&access_token='.$access_token;
	$status = json_decode(Get($http),true);
	if($status['code'] == '1'){
		$configx="<?php
/*数据库配置*/
\$mzconfig=array(
	'domain' => '{$domain}', //网站地址 请求支付接口
	'id' => '{$id}', //拇指付用户ID 支付接口
	'access_token' => '{$access_token}' //拇指付access_token 支付接口
);
?>";

if(file_put_contents('../includes/mzf_config.php',$configx)){
			echo '<div class="alert alert-success">云平台对接成功！</div>';
				echo '<div class="list-group-item list-group-item-info">请继续以下步骤安装完成</div>
				<div class="list-group-item">
					<a href="?do=7" class="btn btn-block btn-warning">安装锁写入</a>
				</div>';
		}else{
			echo '<div class="alert alert-success">云平台配置写入失败！</div>';
				echo '<div class="list-group-item list-group-item-info">请返回以下步骤重新安装</div>
				<div class="list-group-item">
					<a href="?do=5" class="btn btn-block btn-warning">对接易支付</a>
				</div>';
			
		}
		
	}else{
			echo '<div class="alert alert-success">云平台连接失败！</div>';
				echo '<div class="list-group-item list-group-item-info">请返回以下步骤重新安装</div>
				<div class="list-group-item">
					<a href="?do=5" class="btn btn-block btn-warning">对接易支付</a>
				</div>';
	}

		
	
?>

	</div>
</div>

<?php }elseif($do=='7'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">安装完成</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	<span class="sr-only">100%</span>
  </div>
</div>
	<div class="panel-body">
<?php
	@file_put_contents("install.lock",'安装锁');
	echo '<div class="alert alert-success"><font color="green">安装完成！管理账号和密码是:admin/admin</font><br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/>更多设置选项请登录后台管理进行修改。<br/><br/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录建立 install.lock 文件！</font></div>';
}
?>
	</div>
</div>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../assets/layer/layer.js"></script>
</body>
<script type="text/javascript">
$(document).keyup(function(event){
	if(event.keyCode ==13){
		login();
	}
});
function connect(){
   $("#parsley-id").text("");
   var domain = $("#domain").val(), 
       id = $("#id").val(), 
	   access_token = $("#access_token").val();
   layer.msg('正在连接···', {icon: 16,shade: 0.01,time: 15000}); 
   $.ajax( {
	  type: "POST",
	  url: "https://api.muzhifu.cc/Yizf/get.php", 
	  dataType : 'json',
	  timeout : 15000, //超时时间设置，单位毫秒
	  data: "domain="+domain+"&id="+id+"&access_token="+access_token,
	  success: function(data){
		  if(data.code == 0){
			  $("#parsley-id").html(data.msg);
		  }else{
			  $("#parsley-id").html(data.msg);
		  }
		  
	  },
	  error: function(request,status,error) {
		if (status == "timeout"){
			layer.alert('连接超时，请重试！');
		}else{
			layer.alert('连接失败，请重试！');
		}
		return false;
	  },
	});
}
</script>
</div>
</body>
</html>