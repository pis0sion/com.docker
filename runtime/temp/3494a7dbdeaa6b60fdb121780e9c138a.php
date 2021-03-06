<?php /*a:1:{s:36:"../Theme/adminsys/admins\addmin.html";i:1550187480;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link href="/static/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/static/admin/css/style.css" />
		<link href="/static/admin/assets/css/codemirror.css" rel="stylesheet">
		<link rel="stylesheet" href="/static/admin/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/static/admin/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/static/admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
				<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/static/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script  src="/plugins/jquery-1.9.1.min.js"></script>
		<script src="/static/admin/assets/js/bootstrap.min.js"></script>
		<script src="/static/admin/assets/js/typeahead-bs2.min.js"></script>
		<script src="/static/admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/static/admin/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/static/admin/assets/js/ace-elements.min.js"></script>
		<script src="/static/admin/assets/js/ace.min.js"></script>
		<title>系统设置</title>
		
	    <script  src="/plugins/layer/layer.js"></script>
	    <script  src="/plugins/common.js"></script>
	</head>

	<body>
		<div class="margin clearfix">
			<div class="stystems_style">
				<div class="tabbable">
					
					<div class="tab-content">
						<div id="home" class="tab-pane active">
							<form class="form-horizontal" role="form" name="save-form" id="add-member-form" action="">
								
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">登陆账号</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="admin_name" name="admin_name"  value="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">负责人姓名</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="" name="admin_user" id="admin_user"  placeholder=" ">
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label  class="col-lg-2 control-label">登录密码</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="" name="admin_password" id="admin_password"  placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">管理权限</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="admin_role" id="admin_role">
                                            <option value='0' >超级管理员</option>
                                            <?php if(is_array($listclass) || $listclass instanceof \think\Collection || $listclass instanceof \think\Paginator): $i = 0; $__LIST__ = $listclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                            <option value='<?php echo htmlentities($v['id']); ?>' ><?php echo htmlentities($v['title']); ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
           
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="button" id="save-member" class="btn btn-success">修改</button>
                                    </div>
                                </div>
                            </form>
						</div>
						
						
					</div>
				</div>
			</div>

		</div>
		
		<script>
		    $("#save-member").click(function(){
		        var add_url = "<?php echo url("","",true,false);?>";
		        var admin_name = $("#admin_name").val();
		        var admin_user   = $("#admin_user").val();
		        var admin_password = $("#admin_password").val();
		        
		        if(admin_name == ''){
		            errorTips("add-member",$("#admin_name"),"请输入管理账号！");
		            return;
		        }
		        if(admin_user==''){
		            errorTips("add-member",$("#admin_user"),"请输入负责人姓名！");
		            return;
		        }
		        
		         if(admin_password==''){
		            errorTips("add-member",$("#admin_password"),"请输入登录密码!");
		            return;
		        }
		        
		        var data = $("form[name=save-form]").serialize();
		        ajaxPost(add_url,$("#save-member"),data,function (r) {
		            $("#login_btn").removeAttr('disabled');
		            //window.location.href = "<?php echo Url('Admins/index'); ?>";
		           // location.reload();
		        })
		    });
		</script>
	</body>
	
</html>

 