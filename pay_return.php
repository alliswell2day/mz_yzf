<?php
/**
 * 拇指付API支付接口
 * www.muzhifu.cc
 * 返回地址文件
 */
require_once("./includes/common.php");
require_once("./includes/muzhifu/muzhifu.config.php");
require_once("./includes/muzhifu/lib/muzhifu_submit.php");
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php
  $sign = Muzhifu::sign($_GET, $muzhifu_config['key']);
  if ($sign == $_GET['sign']) {
    if ($app_id == $_GET['app_id']) {
      $out_trade_no = $_GET['out_trade_no'];
      $trade_no = $_GET['trade_no'];
      $trade_status = $_GET['trade_status'];
      $srow = $DB->query("SELECT * FROM pay_order WHERE trade_no='{$out_trade_no}' limit 1")->fetch();
      if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
        $DB->query("update `pay_order` set `status` ='1',`endtime` ='$date',`buyer` ='$buyer_email' where `trade_no`='$out_trade_no'");
        $addmoney=round($srow['money']*$conf['money_rate']/100,2);
        $DB->query("update pay_user set money=money+{$addmoney} where id='{$srow['pid']}'");
        $url=creat_callback($srow);
        curl_get($url['notify']);
        proxy_get($url['notify']);
      }
      echo 'success';
    }
    $out_trade_no = $_GET['out_trade_no'];
    $trade_no = $_GET['trade_no'];
    $trade_status = $_GET['trade_status'];
    if($_GET['trade_status'] == 'TRADE_SUCCESS') {
      $srow = $DB->query("SELECT * FROM pay_order WHERE trade_no='{$out_trade_no}' limit 1")->fetch();
      $url=creat_callback($srow);
      if($srow['status']==0){
        $DB->query("update `pay_order` set `status` ='1',`endtime` ='$date' where `trade_no`='$out_trade_no'");
        $addmoney=round($srow['money']*$conf['money_rate']/100,2);
        $DB->query("update pay_user set money=money+{$addmoney} where id='{$srow['pid']}'");
        echo '<script>window.location.href="'.$url['return'].'";</script>';
      }else{
        echo '<script>window.location.href="'.$url['return'].'";</script>';
      }
    }else{
      sysmsg('未成功支付！'."out_trade_no=".$out_trade_no);
    }
  }else {
    sysmsg('验证失败'."out_trade_no=".$srow['out_trade_no']);
  }
  ?>
  <title>拇指付API支付接口</title>
</head>
<body>
</body>
</html>