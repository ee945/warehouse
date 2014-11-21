<?php
include_once ('tpl.header.php');
include_once ('tpl.side.php');
?>
<div id="main-content"> <!-- Main Content Section with everything -->
	
	<noscript> <!-- Show a notification if the user has disabled javascript -->
		<div class="notification error png_bg">
			<div>
				您的浏览器不支持或已关闭Javascript. 请<a href="http://www.google.cn/intl/zh-CN/chrome/browser/" title="Upgrade to chrome">升级</a> 浏览器 或 <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">开启</a> Javascript.
			</div>
		</div>
	</noscript>
	
	<div class="clear"></div> <!-- End .clear -->
	<?php if($noti=="success")
    {
        echo "<div class='notification success png_bg'>
		<a href='#' class='close'><img src=\"".base_url('resources/simpla/images/icons/cross_grey_small.png')."\" title='Close this notification' alt='close' /></a>
		<div>
			操作成功！
		</div>
	</div>";
    }?>    
	<?php if($noti=="success-out")
    {
        echo "<div class='notification success png_bg'>
		<a href='#' class='close'><img src=\"".base_url('resources/simpla/images/icons/cross_grey_small.png')."\" title='Close this notification' alt='close' /></a>
		<div>
			操作成功！请重新登录！
		</div>
	</div>";
    }?>    
	<?php if($name=='admin'&&$this->session->userdata('name')!='admin')
    {
        echo "<div class='notification error png_bg'>
		<a href='#' class='close'><img src=\"".base_url('resources/simpla/images/icons/cross_grey_small.png')."\" title='Close this notification' alt='close' /></a>
		<div>
			<b>操作失败！无权修改管理员！</b>
		</div>
	</div>";
    }?>    
	<?php if($noti=="error")
    {
        echo "<div class='notification error png_bg'>
		<a href='#' class='close'><img src=\"".base_url('resources/simpla/images/icons/cross_grey_small.png')."\" title='Close this notification' alt='close' /></a>
		<div>
			<b>操作失败！没有权限！</b>
		</div>
	</div>";
    }?>    
	<?php if($noti=="attention")
    {
        echo "<div class='notification attention png_bg'>
		<a href='#' class='close'><img src=\"".base_url('resources/simpla/images/icons/cross_grey_small.png')."\" title='Close this notification' alt='close' /></a>
		<div>
			<b>请按要求重新填写！</b>
		</div>
	</div>";
    }?>    

    <?php if(!($name=='admin'&&$this->session->userdata('name')!='admin')){?>
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3><?php echo $actname;?>用户</h3>
			
			<ul class="content-box-tabs">
				<li><a href="#tab1" class="default-tab">添&nbsp;加</a></li> <!-- href must be unique and match the id of target div -->
			</ul>
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
			<div class="tab-content default-tab" id="tab2">
			
				<form method="post" action="<?php echo base_url(); ?>user/<?php echo $action;?>">
					
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						
						<p>
							<label>用户名<span style="color:#ff0000">*</span></label>
							<input id="name" class="text-input small-input" type="text" name="name" value="<?php echo $name;?>" <?php if($actname=='修改')echo 'readonly';?>/><input type="text" name="id" value="<?php echo $id;?>" hidden>
                            <?php echo form_error('name',"<span class='input-notification error png_bg'>",'</span>'); ?>
                            
						</p>
						
						<p>
							<label>密&nbsp;码<span style="color:#ff0000">*</span></label>
							<input id="pass" class="text-input small-input" type="password" name="pass" value="">
                            <?php echo form_error('pass',"<span class='input-notification error png_bg'>",'</span>'); ?>
						</p>
						
						<p>
							<label>确认密码</label>
							<input id="pass2" class="text-input small-input" type="password" name="pass2" value="">
						</p>
						
						<p>
							<label>昵&nbsp;称<span style="color:#ff0000">*</span></label>
							<input id="nick" class="text-input small-input" type="text" name="nick" value="<?php echo $nick;?>">
                            <?php echo form_error('nick',"<span class='input-notification error png_bg'>",'</span>'); ?>
						</p>
						
						<p>
							<label>部&nbsp;门<span style="color:#ff0000">*</span></label>
							<input id="dept" class="text-input small-input" type="text" name="dept" value="<?php echo $dept;?>">
                            <?php echo form_error('dept',"<span class='input-notification error png_bg'>",'</span>'); ?>
						</p>

                        <?php if(ifpermit($this->session->userdata('grade'),6)){?>
						<p>
							<label>操作权限</label>
							<input type="checkbox" name="grade[]" checked
                            <?php echo "onclick=\"alert('查询是基本权限，不能取消！');return false;\"";?> value="1">查询&nbsp;
                    		<input type="checkbox" name="grade[]" <?php echo $gchk2;?>
                            <?php if($name=="admin")echo "onclick=\"alert('管理员不能取消任何权限！');return false;\"";?> value="2">添加&nbsp;
                    		<input type="checkbox" name="grade[]" <?php echo $gchk3;?>
                            <?php if($name=="admin")echo "onclick=\"alert('管理员不能取消任何权限！');return false;\"";?> value="3">修改&nbsp;
                    		<input type="checkbox" name="grade[]" <?php echo $gchk4;?>
                            <?php if($name=="admin")echo "onclick=\"alert('管理员不能取消任何权限！');return false;\"";?> value="4">删除&nbsp;
						</p>
						<p>
							<label>访问权限</label>
                    		<input type="checkbox" name="grade[]" <?php echo $gchk5;?>
                            <?php if($name=="admin")echo "onclick=\"alert('管理员不能取消任何权限！');return false;\"";?> value="5">进出记录&nbsp;
                    		<input type="checkbox" name="grade[]" <?php echo $gchk6;?>
                            <?php if($name=="admin")echo "onclick=\"alert('管理员不能取消任何权限！');return false;\"";?> value="6">用户管理&nbsp;
                    		<input type="checkbox" name="grade[]" <?php echo $gchk7;?>
                            <?php if($name=="admin")echo "onclick=\"alert('管理员不能取消任何权限！');return false;\"";?> value="7">备份&nbsp;
                    		<input type="checkbox" name="grade[]" <?php echo $gchk8;?>
                            <?php if($name=="admin")echo "onclick=\"alert('管理员不能取消任何权限！');return false;\"";?> value="8">设置&nbsp;
						</p>
		                <?php } ?>

						<p>
							<label>备&nbsp;注</label>
							<textarea id="remark" class="text-input textarea wysiwyg" name="remark" cols="20" rows="5"><?php echo $remark;?></textarea>
						</p>
						
						<p>
							<input class="button" type="submit" name="postdata" value="<?php echo $actname;?>" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
				
			</div> <!-- End #tab2 -->        
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
	<?php } ?>
	
<?php
include_once ('tpl.footer.php');
?>
