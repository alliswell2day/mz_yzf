<?php
include("../includes/common.php");
$title='拇指付易支付管理中心';
include './head.php';
?>

<?php
$count1=$DB->query("SELECT count(*) from pay_order")->fetchColumn();
$count2=$DB->query("SELECT count(*) from pay_user")->fetchColumn();
$data=unserialize(file_get_contents(SYSTEM_ROOT.'db.txt'));
$mysqlversion=$DB->query("select VERSION()")->fetch();
?>

      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">后台管理首页</h3></div>
          <ul class="list-group">
            <li class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <b>订单总数：</b><?php echo $count1?></li>
			<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>商户数量：</b><?php echo $count2?></li>
			<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>总计余额：</b><?php echo $data['usermoney']?>元（每小时更新一次）</li>
			<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>结算余额：</b><?php echo $data['settlemoney']?>元（每小时更新一次）</li>
            <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b> <?=$date?></li>
			<li class="list-group-item"><span class="glyphicon glyphicon-home"></span> <a href="../" class="btn btn-xs btn-primary">返回首页</a>
			</li>
          </ul>
      </div>
	  <div class="panel panel-success">
          <table class="table table-bordered table-striped">
		    <thead><tr><th class="success">订单收入统计</th><th>支付宝</th><th>微信支付</th><th>QQ钱包</th><th>财付通</th><th>总计</th></thead>
            <tbody>
			  <tr><td>今日</td><td><?php echo round($data['order_today']['alipay.trade.precreate'],2)?></td><td><?php echo round($data['order_today']['wxpay.pay.unifiedorder'],2)?></td><td><?php echo round($data['order_today']['qq.pay.native'],2)?></td><td><?php echo round($data['order_today']['tenpay.trade.precreate'],2)?></td><td><?php echo round($data['order_today']['all'],2)?></td></tr>
			  <tr><td>昨日</td><td><?php echo round($data['order_lastday']['alipay.trade.precreate'],2)?></td><td><?php echo round($data['order_lastday']['wxpay.pay.unifiedorder'],2)?></td><td><?php echo round($data['order_lastday']['qq.pay.native'],2)?></td><td><?php echo round($data['order_lastday']['tenpay.trade.precreate'],2)?></td><td><?php echo round($data['order_lastday']['all'],2)?></td></tr>
			</tbody>
          </table>
      </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">服务器信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>PHP 版本：</b><?php echo phpversion() ?>
			<?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
		</li>
		<li class="list-group-item">
			<b>MySQL 版本：</b><?php echo $mysqlversion[0] ?>
		</li>
		<li class="list-group-item">
			<b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
		</li>
		
		<li class="list-group-item">
			<b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s
		</li>
		<li class="list-group-item">
			<b>POST许可：</b><?php echo ini_get('post_max_size'); ?>
		</li>
		<li class="list-group-item">
			<b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?>
		</li>
	</ul>
</div>
    </div>
  </div>