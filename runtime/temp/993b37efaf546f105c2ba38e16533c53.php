<?php /*a:1:{s:33:"../Theme/adminsys/main/login.html";i:1549956970;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="/static/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/static/admin/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="__MODE__/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="/static/admin/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/static/admin/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/static/admin/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="/static/admin/css/style.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/static/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/static/admin/assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="/static/admin/assets/js/html5shiv.js"></script>
		<script src="/static/admin/assets/js/respond.min.js"></script>
		<![endif]-->
		<script  src="/plugins/jquery-1.9.1.min.js"></script>
	    <script  src="/plugins/layer/layer.js"></script>
	    <script  src="/plugins/common.js"></script>
		<title>登录-<?php echo htmlentities($config['SITE_NAME']); ?></title>
		
	</head>

	<body class="login-layout Reg_log_style">
		<div class="logintop">
			<span>欢迎后台管理界面平台</span>
			<ul>
				<li>
					<a href="#">返回首页</a>
				</li>
				<li>
					<a href="#">帮助</a>
				</li>
				<li>
					<a href="#">关于</a>
				</li>
			</ul>
		</div>
		<div class="loginbody">
			<div class="login-container">
				<div class="center">
					<img src="/static/admin/images/logo1.png" />
				</div>

				<div class="space-6"></div>

				<div class="position-relative">
					<div id="login-box" class="login-box widget-box no-border visible">
						<div class="widget-body">
							<div class="widget-main">
								<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												管理员登录
											</h4>

								<div class="login_icon"><img src="/static/admin/images/login.png" /></div>

								<form class="">
									<fieldset>
										<ul>
											<li class="frame_style form_error"><label class="user_icon"></label><input name="用户名" type="text" id="login_name" /><i>用户名</i></li>
											<li class="frame_style form_error"><label class="password_icon"></label><input name="密码" type="password" id="password" /><i>密码</i></li>
											<li class="frame_style form_error"><label class="Codes_icon"></label><input style="width: 158px;" name="验证码" type="text" id="code" /><i>验证码</i>
											<div class="Codes_region"><img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+new Date().getTime();" id='captchas' alt="captcha" /></div>
											</li>

										</ul>
										<div class="space"></div>

										<div class="clearfix">
											<label class="inline">
															<input type="checkbox" class="ace">
															<span class="lbl">保存密码</span>
														</label>

											<button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="login_btn">
															<i class="icon-key"></i>
															登录
														</button>
										</div>

										<div class="space-4"></div>
									</fieldset>
								</form>

								<div class="social-or-login center">
									<span class="bigger-110">通知</span>
								</div>

								<div class="social-login center">
									本网站系统不再对IE8以下浏览器支持，请见谅。
								</div>
							</div>
							<!-- /widget-main -->

							<div class="toolbar clearfix">

							</div>
						</div>
						<!-- /widget-body -->
					</div>
					<!-- /login-box -->
				</div>
				<!-- /position-relative -->
			</div>
		</div>
		<div class="loginbm">版权所有 2018
			<a href=""><?php echo htmlentities($config['SITE_COMPANY']); ?></a>
		</div><strong></strong>
	</body>

</html>
<script>
	$('#login_btn').on('click', function() {
		var log_url    = $("#login_form").attr('action');
        var login_name = $("#login_name").val();
        var password   = $("#password").val();
        var code   	   = $("#code").val();

        if(login_name==''){
            errorTips("login_btn",$("#login_name"),"请输入登录账户");
            return;
        }
        if(password==''){
            errorTips("login_btn",$("#password"),"请输入登录密码");
            return;
        }
		if(code==''){
			errorTips("login_btn",$("#code"),"请输入验证码");
            return;
		}
        $.ajax({
              type: 'post',
              url:log_url,
              data: {
                login_name:login_name,
                password:password,
                code:code
              },
              cache: false,
              dataType: 'json',
              success: function(data) {
                 layer.msg(data.msg);
                if(data.error == 0) {
                 $("#login_btn").removeAttr('disabled');
                   window.location.href = data.url;
                } else {
                    $('#captchas').click();
                }
              }
      }); 
	});
	$(document).ready(function() {
		$("input[type='text'],input[type='password']").blur(function() {
			var $el = $(this);
			var $parent = $el.parent();
			$parent.attr('class', 'frame_style').removeClass(' form_error');
			if($el.val() == '') {
				$parent.attr('class', 'frame_style').addClass(' form_error');
			}
		});
		$("input[type='text'],input[type='password']").focus(function() {
			var $el = $(this);
			var $parent = $el.parent();
			$parent.attr('class', 'frame_style').removeClass(' form_errors');
			if($el.val() == '') {
				$parent.attr('class', 'frame_style').addClass(' form_errors');
			} else {
				$parent.attr('class', 'frame_style').removeClass(' form_errors');
			}
		});
	})
</script>