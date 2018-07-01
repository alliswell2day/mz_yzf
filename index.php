<?php
include ("./includes/common.php");
?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-cn">
    <title><?=$conf['web_name']?> - <?=$conf['web_name_end']?></title>
    <meta name="description" content="<?=$conf['description']?>">
    <meta name="keywords" content="<?=$conf['keywords']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="skin/js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="skin/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="skin/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="skin/css/amazeui.min.css">
</head>
<body class="landing">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="#"><?=$conf['web_name']?></a></h1>
        <nav id="nav">
            <ul>
                <li><a href="#">首页</a></li>
                <li>
                    <a href="#" class="icon fa-angle-down">菜单栏</a>
                    <ul>
                        <li><a href="help.html">开发文档</a></li>
                        <li><a href="/SDK/">在线测试</a></li>
                        <li>
                            <a href="mailto:<?=$conf['web_qq']?>@qq.com">邮箱联系</a>
                            <ul>
                                <li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$conf['web_qq']?>&site=qq&menu=yes">联系QQ</a></li>
                                <li><a href="//shang.qq.com/wpa/qunwpa?idkey=e7aa2568dea1209e813dc7ba7832b31f85f79626238ad35ac38d0cd8def887a6">进入QQ群</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="/user/reg.php?my=add" class="button">申请商户</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <h2><?=$conf['web_name']?> - <?=$conf['web_name_end']?></h2>
        <p>提供免签约支付宝、QQ钱包、微信、财付通支付.</p>
        <ul class="actions">
            <li><a href="/user" class="button">登陆商户</a></li>
            <li><a href="/user/reg.php?my=add" class="button">在线注册</a></li>
        </ul>
    </section>

    <!-- Main -->
    <section class="container">

        <section class="box special">
            <h2>我们的服务</h2>
        </section>

        <section class="box special features">
            <div class="features-row">
                <section>
                    <span class="icon major fa-bolt accent2">省</span>
                    <h3>资金回笼</h3>
                    <p>一次轻松接入所有支付，省时省心省力， 结算费率低，利润高！</p>
                </section>
                <section>
                    <span class="icon major fa-area-chart accent3">低</span>
                    <h3>我们优势</h3>
                    <p>对接费率超低，比其它平台更便宜.24小时监视订单 和资金安全，正规支付接口 全程安全无忧！</p>
                </section>
            </div>
            <div class="features-row">
                <section>
                    <span class="icon major fa-cloud accent4">快</span>
                    <h3>高效服务</h3>
                    <p>我们提供7X24小时在线服务，对日交易高额用户可提供一对一服务！</p>
                </section>
                <section>
                    <span class="icon major fa-lock accent5">稳</span>
                    <h3>安全保证</h3>
                    <p>实时查询，安全可靠，多重账号保护措施安全可靠； 业内费率比率高，维护商户利益，7*24小时全天候服务。</p>
                </section>
            </div>
        </section>

        <div class="row">
            <div class="6u 12u(narrower)">

            </div>

    </section>

    <!-- CTA -->

    <section class="am-container m-home-box m-partner">

        <hgroup data-am-scrollspy="{animation:'slide-bottom', delay: 100}" class="am-scrollspy-init am-scrollspy-inview am-animation-slide-bottom">
            <h2>协助伙伴</h2>
            <p>用最具影响力品牌协助，并全力协助新兴品牌，我们以设计助力众多品牌走向行业领先地位，鼎力相助每一个梦想。</p>
        </hgroup>
        <ul class="am-avg-lg-8 am-avg-md-8 am-avg-sm-2  am-thumbnails am-scrollspy-init am-scrollspy-inview am-animation-slide-bottom" data-am-scrollspy="{animation:'slide-bottom', delay: 100}">
            <li data-am-scrollspy="{animation:'slide-bottom', delay: 44}" class="am-scrollspy-init am-scrollspy-inview am-animation-slide-bottom">
                <img src="skin/images/aliyun.png" alt="支付宝" class="am-img-responsive"></li>
            <li data-am-scrollspy="{animation:'slide-bottom', delay: 45}" class="am-scrollspy-init am-scrollspy-inview am-animation-slide-bottom">
                <img src="skin/images/qqpay.png" alt="ＱＱ钱包" class="am-img-responsive"></li>
            <li data-am-scrollspy="{animation:'slide-bottom', delay: 399}" class="am-scrollspy-init am-scrollspy-inview am-animation-slide-bottom">
                <img src="skin/images/wxpay.png" alt="微信支付" class="am-img-responsive"></li>
            <li data-am-scrollspy="{animation:'slide-bottom', delay: 286}" class="am-scrollspy-init am-scrollspy-inview am-animation-slide-bottom">
                <img src="skin/images/cftpay.png" alt="财付通" class="am-img-responsive"></li>
        </ul>
    </section>
    </form>

    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; <?=$conf['web_name']?>. All rights reserved.</li>
            <li>Producer: <a href="#"><?=$conf['web_name']?></a></li>
            <li>author：support@<?=$conf['local_domain']?>
        </ul>
        <ul class="copyright">
            <li><?=$conf['web_name']?> - 提供免签约支付接口 - 方便、快捷、便利！
                <a href="#" target="_blank"><?=$conf['web_name']?></a>					</li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/jquery.dropotron.min.js"></script>
<script src="skin/js/jquery.scrollgress.min.js"></script>
<script src="skin/js/skel.min.js"></script>
<script src="skin/js/util.js"></script>
<!--[if lte IE 8]><script src="skin/js/respond.min.js"></script><![endif]-->
<script src="skin/js/main.js"></script>


</body>
</html>