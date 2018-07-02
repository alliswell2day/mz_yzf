<?php
/**
 * Created by PhpStorm.
 * User: cghang
 * Date: 2018/7/1
 * Time: 8:54 PM
 */
include '../includes/common.php';
include '../includes/mzf_config.php';
$title = '拇指付云平台';
include './head.php';
$act = isset($_GET['act']) ? $_GET['act'] : null;
$mod = isset($_GET['mod']) ? $_GET['mod'] : null;
if ($mod == 'cloud_post' && $_POST['do'] == 'submit') {
    $appid = $_POST['appid'];
    $appkey = $_POST['appkey'];
    $access_token = $_POST['access_token'];

    saveSetting('appid', $appid);
    saveSetting('appkey', $appkey);
    //saveSetting('access_token', $access_token);
    $ad = $CACHE->clear();
    if ($ad) {
        showmsg('修改成功！', 1);exit;
    } else {
        showmsg('修改失败！<br/>' . $DB->error(), 4);
    }
}
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">云平台对接管理</h3></div>
<div class="panel-body">
  <form action="?mod=cloud_post" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">对接拇指付商户APPID</label>
	  <div class="col-sm-10"><input type="text" name="appid" value="';
echo $conf['appid'];
echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">对接拇指付商户APPKEY</label>
	  <div class="col-sm-10"><input type="text" name="appkey" value="';
echo $conf['appkey'];
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
?>

