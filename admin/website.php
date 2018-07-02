<?php
/**
 * Created by PhpStorm.
 * User: cghang
 * Date: 2018/7/1
 * Time: 4:53 PM
 */
include '../includes/common.php';
$title = '后台管理';
include './head.php';

?>
<?php
$act = isset($_GET['act']) ? $_GET['act'] : null;
$mod = isset($_GET['mod']) ? $_GET['mod'] : null;
if ($mod == 'website_post' && $_POST['do'] == 'submit') {
    $web_name = $_POST['web_name'];
    $web_name_end = $_POST['web_name_end'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $web_qq = $_POST['web_qq'];
    $isreg = $_POST['isreg'];
    $quicklogin = $_POST['quicklogin'];
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    if ($web_name == NULL) {
        showmsg('必填项不能为空！', 3);
    }
    saveSetting('web_name', $web_name);
    saveSetting('web_name_end', $web_name_end);
    saveSetting('keywords', $keywords);
    saveSetting('description', $description);
    saveSetting('web_qq', $web_qq);
    saveSetting('is_reg', $isreg);
    saveSetting('quicklogin', $quicklogin);
    saveSetting('admin_user', $user);
    if (!empty($pwd)) {
        saveSetting('admin_pwd', $pwd);
    }
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>', 4);
    }
}elseif ($mod == 'mail' && $_POST['do'] == 'submit') {
    $mail_cloud = $_POST['mail_cloud'];
    $mail_smtp = $_POST['mail_smtp'];
    $mail_port = $_POST['mail_port'];
    $mail_name = $mail_cloud == 1 ? $_POST['mail_name2'] : $_POST['mail_name'];
    $mail_pwd = $_POST['mail_pwd'];
    $mail_apiuser = $_POST['mail_apiuser'];
    $mail_apikey = $_POST['mail_apikey'];
    $mail_recv = $_POST['mail_recv'];
    saveSetting('mail_cloud', $mail_cloud);
    saveSetting('mail_smtp', $mail_smtp);
    saveSetting('mail_port', $mail_port);
    saveSetting('mail_name', $mail_name);
    saveSetting('mail_pwd', $mail_pwd);
    saveSetting('mail_apiuser', $mail_apiuser);
    saveSetting('mail_apikey', $mail_apikey);
    saveSetting('mail_recv', $mail_recv);
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>', 4);
    }
}elseif ($mod == 'sendsms_post' && $_POST['do'] == 'submit') {
    $sms_uid = $_POST['sms_uid'];
    $sms_token = $_POST['sms_token'];

    saveSetting('sms_uid', $sms_uid);
    saveSetting('sms_token', $sms_token);
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>', 4);
    }
}elseif ($mod == 'pay_post' && $_POST['do'] == 'submit') {
    $alipay_type = $_POST['alipay_type'];
    $wxpay_type = $_POST['wxpay_type'];
    $qqpay_type = $_POST['qqpay_type'];

    saveSetting('alipay_type', $alipay_type);
    saveSetting('wxpay_type', $wxpay_type);
    saveSetting('qqpay_type', $qqpay_type);
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>', 4);
    }
}elseif ($mod == 'captcha_post' && $_POST['do'] == 'submit') {
    $private_key = $_POST['private_key'];
    $captcha_id = $_POST['captcha_id'];

    saveSetting('CAPTCHA_ID', $captcha_id);
    saveSetting('PRIVATE_KEY', $private_key);
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>', 4);
    }
}elseif ($mod == 'pay_fee_post' && $_POST['do'] == 'submit') {
    $money_rate = $_POST['money_rate'];
    $settle_money = $_POST['settle_money'];
    $settle_rate = $_POST['settle_rate'];
    $settle_fee_min = $_POST['settle_fee_min'];
    $settle_fee_max = $_POST['settle_fee_max'];
    $settle_open = $_POST['settle_open'];

    saveSetting('money_rate', $money_rate);
    saveSetting('settle_money', $settle_money);
    saveSetting('settle_rate', $settle_rate);
    saveSetting('settle_fee_min', $settle_fee_min);
    saveSetting('settle_fee_max', $settle_fee_max);
    saveSetting('settle_open', $settle_open);
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>', 4);
    }
}elseif ($mod == 'reg_post' && $_POST['do'] == 'submit') {
    $is_reg = $_POST['is_reg'];
    $is_payreg = $_POST['is_payreg'];
    $reg_pid = $_POST['reg_pid'];
    $reg_price = $_POST['verifytype'];
    $stype_1 = $_POST['stype_1'];
    $stype_2 = $_POST['stype_2'];
    $stype_3 = $_POST['stype_3'];
    $stype_4 = $_POST['stype_4'];

    saveSetting('is_reg', $is_reg);
    saveSetting('is_payreg', $is_payreg);
    saveSetting('reg_pid', $reg_pid);
    saveSetting('verifytype', $verifytype);
    saveSetting('stype_1', $stype_1);
    saveSetting('stype_2', $stype_2);
    saveSetting('stype_3', $stype_3);
    saveSetting('stype_4', $stype_4);
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>', 4);
    }
}

if ($act == 'mail') {
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">发信邮箱配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=mail_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">发信模式</label>
	  <div class="col-sm-10"><select class="form-control" name="mail_cloud" default="';
    echo $conf['mail_cloud'];
    echo '"><option value="0">普通模式</option><option value="1">搜狐Sendcloud</option><option value="3">创意Cloud邮箱#测试中</option></select></div>
	</div><br/>
	<div id="frame_set1" style="';
    echo $conf['mail_cloud'] == 1 ? 'display:none;' : 'NULL';
    echo '">
	<div class="form-group">
	  <label class="col-sm-2 control-label">SMTP服务器</label>
	  <div class="col-sm-10"><input type="text" name="mail_smtp" value="';
    echo $conf['mail_smtp'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">SMTP端口</label>
	  <div class="col-sm-10"><input type="text" name="mail_port" value="';
    echo $conf['mail_port'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱账号</label>
	  <div class="col-sm-10"><input type="text" name="mail_name" value="';
    echo $conf['mail_name'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱密码</label>
	  <div class="col-sm-10"><input type="text" name="mail_pwd" value="';
    echo $conf['mail_pwd'];
    echo '" class="form-control"/></div>
	</div><br/>
	</div>
	<div id="frame_set2" style="';
    echo $conf['mail_cloud'] == 0 ? 'display:none;' : 'NULL';
    echo '">
	<div class="form-group">
	  <label class="col-sm-2 control-label">API_USER</label>
	  <div class="col-sm-10"><input type="text" name="mail_apiuser" value="';
    echo $conf['mail_apiuser'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">API_KEY</label>
	  <div class="col-sm-10"><input type="text" name="mail_apikey" value="';
    echo $conf['mail_apikey'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发信邮箱</label>
	  <div class="col-sm-10"><input type="text" name="mail_name2" value="';
    echo $conf['mail_name'];
    echo '" class="form-control"/></div>
	</div><br/>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/>';
    echo '	 </div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
此功能为用户下单时给自己发邮件提醒。<br/>使用普通模式发信时，建议使用QQ邮箱，SMTP服务器smtp.qq.com，端口465，密码不是QQ密码也不是邮箱独立密码，是QQ邮箱设置界面生成的<a href="http://service.mail.qq.com/cgi-bin/help?subtype=1&&no=1001256&&id=28"  target="_blank" rel="noreferrer">授权码</a>。
</div>
</div>
<script>
$("select[name=\'mail_cloud\']").change(function(){
	if($(this).val() == 0){
		$("#frame_set1").css("display","inherit");
		$("#frame_set2").css("display","none");
	}else{
		$("#frame_set1").css("display","none");
		$("#frame_set2").css("display","inherit");
	}
});
</script>
';
}elseif($act == 'pay_api'){
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">支付接口配置</h3></div>
<div class="panel-body">
  <form action="./website.php?mod=pay_post" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">支付宝支付接口</label>
	  <div class="col-sm-10"><select class="form-control" name="alipay_type" default="\';
    echo $conf[\'alipay_type\'];
    echo \'">';
    echo $alipay_type = $conf['alipay_type'] == '0'?'<option value="0">支付宝官方调用(当前)</option>':'<option value="1">本地扫码支付调用(当前)</option>';
    echo '<option value="0">支付宝官方调用</option><option value="1">本地扫码支付调用</option></select></div>
	</div><br/>
	    <div class="form-group">
	  <label class="col-sm-2 control-label">微信支付接口</label>
	  <div class="col-sm-10"><select class="form-control" name="wxpay_type" default="\\';
    echo $conf['wxpay_type'];
    echo '">';
    echo $wxpay_type = $conf['wxpay_type'] == '0'?'<option value="0">拇指付接口调用(当前)</option>':'<option value="1">本地扫码调用(当前)</option>';
    echo '<option value="0">拇指付接口调用</option><option value="1">本地扫码支付调用</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">QQ支付接口</label>
	  <div class="col-sm-10"><select class="form-control" name="qqpay_type" default="\\';
    echo $conf['qqpay_type'];
    echo '">';
    echo $wxpay_type = $conf['qqpay_type'] == '0'?'<option value="0">拇指付接口调用(当前)</option>':'<option value="1">本地扫码调用(当前)</option>';
    echo '<option value="0">拇指付接口调用</option><option value="1">本地扫码支付调用</option></select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>

  </form>
</div>
</div>
';
}elseif($act == 'sendsms'){
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">106发信配置</h3></div>
<div class="panel-body">
  <form action="./website.php?mod=sendsms_post" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发信UID</label>
	  <div class="col-sm-10"><input type="text" name="sms_uid" value="';
    echo $conf['sms_uid'];
    echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发信TOKEN</label>
	  <div class="col-sm-10"><input type="text" name="sms_token" value="';
    echo $conf['sms_token'];
    echo '" class="form-control"/></div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>

  </form>
</div>
</div>
';
}elseif($act == 'captcha_api'){
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">极验证信息配置</h3></div>
<div class="panel-body">
  <form action="?mod=captcha_post" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">CAPTCHA_ID</label>
	  <div class="col-sm-10"><input type="text" name="captcha_id" value="';
    echo $conf['CAPTCHA_ID'];
    echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">PRIVATE_KEY</label>
	  <div class="col-sm-10"><input type="text" name="private_key" value="';
    echo $conf['PRIVATE_KEY'];
    echo '" class="form-control"/></div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>

  </form>
</div>
</div>
';
}elseif($act == 'pay_fee'){
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">支付费率配置</h3></div>
<div class="panel-body">
  <form action="?mod=pay_fee_post" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">默认支付分成比例（百分数）</label>
	  <div class="col-sm-10"><input type="text" name="money_rate" value="';
    echo $conf['money_rate'];
    echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">结算费率</label>
	  <div class="col-sm-10"><input type="text" name="settle_rate" value="';
    echo $conf['settle_rate'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">结算手续费最小</label>
	  <div class="col-sm-10"><input type="text" name="settle_fee_min" value="';
    echo $conf['settle_fee_min'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">结算手续费最大</label>
	  <div class="col-sm-10"><input type="text" name="settle_fee_max" value="';
    echo $conf['settle_fee_max'];
    echo '" class="form-control"/></div>
	</div>
		<div class="form-group">
	  <label class="col-sm-2 control-label">手动申请结算开关</label>
	  <div class="col-sm-10"><select class="form-control" name="settle_open" default="';
    echo $conf['settle_open'];
    echo '">';
    echo $settle_open = $conf['settle_open'] == '0'?'<option value="0">关闭(当前)</option>':'<option value="1">开启(当前)</option>';
    echo '<option value="0">开启</option><option value="1">关闭</option></select></div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>

  </form>
</div>
</div>
';
}elseif($act == 'reg'){
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">用户注册配置</h3></div>
<div class="panel-body">
  <form action="?mod=reg_post" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">自助申请商户</label>
	  <div class="col-sm-10"><select class="form-control" name="is_reg" default="';
    echo $conf['is_reg'];
    echo '">';
    echo $is_reg = $conf['is_reg'] == '0'?'<option value="0">关闭(当前)</option>':'<option value="1">开启(当前)</option>';
    echo '<option value="0">开启</option><option value="1">关闭</option></select></div>
	</div>
		<div class="form-group">
	  <label class="col-sm-2 control-label">付费申请</label>
	  <div class="col-sm-10"><select class="form-control" name="is_payreg" default="';
    echo $conf['is_payreg'];
    echo '">';
    echo $is_payreg = $conf['is_payreg'] == '0'?'<option value="0">关闭(当前)</option>':'<option value="1">开启(当前)</option>';
    echo '<option value="0">开启</option><option value="1">关闭</option></select></div>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">注册验证类型</label>
	  <div class="col-sm-10"><select class="form-control" name="verifytype" default="';
    echo $conf['verifytype'];
    echo '">';
    echo $verifytype = $conf['verifytype'] == '0'?'<option value="0">邮箱验证(当前)</option>':'<option value="1">手机验证(当前)</option>';
    echo '<option value="0">邮箱验证</option><option value="1">手机验证</option></select></div>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">支付宝结算</label>
	  <div class="col-sm-10"><select class="form-control" name="stype_1" default="';
    echo $conf['stype_1'];
    echo '">';
    echo $stype_1 = $conf['stype_1'] == '0'?'<option value="0">关闭(当前)</option>':'<option value="1">开启(当前)</option>';
    echo '<option value="0">关闭</option><option value="1">开启</option></select></div>
	</div>		<div class="form-group">
	  <label class="col-sm-2 control-label">微信结算</label>
	  <div class="col-sm-10"><select class="form-control" name="stype_2" default="';
    echo $conf['stype_2'];
    echo '">';
    echo $stype_2 = $conf['stype_2'] == '0'?'<option value="0">关闭(当前)</option>':'<option value="1">开启(当前)</option>';
    echo '<option value="0">关闭</option><option value="1">开启</option></select></div>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">QQ结算</label>
	  <div class="col-sm-10"><select class="form-control" name="stype_3" default="';
    echo $conf['stype_3'];
    echo '">';
    echo $stype_3 = $conf['stype_3'] == '0'?'<option value="0">关闭(当前)</option>':'<option value="1">开启(当前)</option>';
    echo '<option value="0">关闭</option><option value="1">开启</option></select></div>
	</div>	
	<div class="form-group">
	  <label class="col-sm-2 control-label">银行卡结算</label>
	  <div class="col-sm-10"><select class="form-control" name="stype_4" default="';
    echo $conf['stype_4'];
    echo '">';
    echo $stype_4 = $conf['stype_4'] == '0'?'<option value="0">关闭(当前)</option>':'<option value="1">开启(当前)</option>';
    echo '<option value="0">关闭</option><option value="1">开启</option></select></div>
	</div>	
	<div class="form-group">
	  <label class="col-sm-2 control-label">付费申请收款商户ID</label>
	  <div class="col-sm-10"><input type="text" name="reg_pid" value="';
    echo $conf['reg_pid'];
    echo '" class="form-control"></div>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户申请价格</label>
	  <div class="col-sm-10"><input type="text" name="reg_price" value="';
    echo $conf['reg_price'];
    echo '" class="form-control"></div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"><br/>
	 </div>
	</div>
  </form>
</div>
</div>
';
}else{
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站信息配置</h3></div>
<div class="panel-body">
  <form action="./website.php?mod=website_post" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-sm-10"><input type="text" name="web_name" value="';
    echo $conf['web_name'];
    echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">标题栏后缀</label>
	  <div class="col-sm-10"><input type="text" name="web_name_end" value="';
    echo $conf['web_name_end'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">关键字</label>
	  <div class="col-sm-10"><input type="text" name="keywords" value="';
    echo $conf['keywords'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站描述</label>
	  <div class="col-sm-10"><input type="text" name="description" value="';
    echo $conf['description'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">客服ＱＱ</label>
	  <div class="col-sm-10"><input type="text" name="web_qq" value="';
    echo $conf['web_qq'];
    echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">登陆方式</label>
	  <div class="col-sm-10"><select class="form-control" name="quicklogin" default="';
    echo $conf['quicklogin'];
    echo '"><option value="0">不开启</option><option value="1">支付宝登陆</option><option value="2">QQ登陆</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户注册</label>
	  <div class="col-sm-10"><select class="form-control" name="isreg" default="\';
    echo $conf[\'is_reg\'];
    echo \'"><option value="1">开放自助注册</option><option value="0">关闭自助注册</option></select></div>
	</div><br/>
	<h4>管理员账号设置</h4>
	<div class="form-group">
	  <label class="col-sm-2 control-label">用户名</label>
	  <div class="col-sm-10"><input type="text" name="user" value="';
    echo $conf['admin_user'];
    echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">密码重置</label>
	  <div class="col-sm-10"><input type="text" name="pwd" value="" class="form-control" placeholder="不修改请留空"/></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>

  </form>
</div>
</div>
';
}
?>