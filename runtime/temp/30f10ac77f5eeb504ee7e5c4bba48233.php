<?php /*a:1:{s:34:"../Theme/index/index/download.html";i:1542075422;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>App下载</title>
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
        <meta content="yes" name="apple-mobile-web-app-capable"/>
        <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
        <meta content="telephone=no" name="format-detection"/>
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<link rel="stylesheet" href="/static/index/css/app.css" />
		
    </head>
    <body>
        <section class="aui-flexView">
            <header class="aui-navBar aui-navBar-fixed b-line">
                <a href="<?php echo Url('/'); ?>" class="aui-navBar-item">
                    <i class="icon icon-return"></i>
                </a>
                <div class="aui-center">
                    <span class="aui-center-title">App下载</span>
                </div>
                <a href="javascript:;" class="aui-navBar-item">
                    <i class="icon icon-sys"></i>
                </a>
            </header>
            <section class="aui-scrollView">
                <div class="aui-back-box">
                    <div class="aui-back-pitch">
                        <img src="<?php echo getconfig('SITE_LOGO'); ?>" alt=""> 
                    </div>
                    <div class="aui-back-title">
                        <h2><?php echo getconfig('SITE_NAME'); ?></h2>
                        <p>系统版本V<?php echo htmlentities($data['app_verber']); ?></p>
                    </div>
                    <div style="height: 205px;line-height: 50px;padding-top: 73px;">
                    	如果您是在微信内访问<br/>
                    	请点击右上角在浏览器上打开
                    </div>
                    <div class="aui-back-button">
                        <button onclick="download('android')">安卓APP下载</button>
                    </div>
                    <div class="aui-back-button">
                        <button onclick="download('ios')">苹果APP下载</button>
                    </div>
                </div>
            </section>
        </section>
		<div class="weixin-tip">
			<p>
				<img src="/static/index/img/live_weixin.png" style="width: 100%;" alt="微信打开"/>
			</p>
		</div>
    </body>
    
    	<script type="text/javascript">
       
			var winHeight = $(window).height();
			function weixinTps(){
				$(".weixin-tip").css("height",winHeight);
		        $(".weixin-tip").show();
			}
	    	//判断是否微信登陆
			function isWeiXin() {
				var ua = window.navigator.userAgent.toLowerCase();
				console.log(ua);//mozilla/5.0 (iphone; cpu iphone os 9_1 like mac os x) applewebkit/601.1.46 (khtml, like gecko)version/9.0 mobile/13b143 safari/601.1
				if (ua.match(/MicroMessenger/i) == 'micromessenger') {
					return true;
				} else {
					return false;
				}
			}
			
	    	function download(type){
	    		
	    		if(isWeiXin()){
					//启动微信提示
					weixinTps();
					console.log("是来自微信内置浏览器");
				}else{
					if(type=='ios'){
						<?php if($data['app_ioslink'] =='#'): ?>
							alert('暂无下载链接');
						<?php else: ?>
							window.location.href='<?php echo htmlentities($data['app_ioslink']); ?>';
						<?php endif; ?>
					}else{
						<?php if($data['app_androlink'] =='#'): ?>
							alert('暂无下载链接');
						<?php else: ?>
							window.location.href='<?php echo htmlentities($data['app_androlink']); ?>';
						<?php endif; ?>
					}
					console.log("不是来自微信内置浏览器");
				}
	    		
	    	}
		
    </script>
</html>
