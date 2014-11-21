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
	
	<!-- Page Head -->
	<h2 style="font-family:微软雅黑;">快速导航</h2>
	<p id="page-intro" style="font-family:微软雅黑;">你想做什么？</p>

	<ul class="shortcut-buttons-set">
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/index_64.png" alt="icon" /><br />
			首页
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>user/edit/<?php echo $this->session->userdata('name');?>"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/user_info_64.png" alt="icon" /><br />
			个人资料
		</span></a></li>
		
		<li><a class="shortcut-button" href="#messages" rel="modal"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/message_64.png" alt="icon" /><br />
			消息
		</span></a></li>
		
        <?php if($this->session->userdata('name')!=''){?>
		<li><a class="shortcut-button" href="<?php echo base_url();?>login/out"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/logout_64.png" alt="icon" /><br />
			退出
		</span></a></li>
		<?php } ?>

        <?php if($this->session->userdata('name')==''){?>
		<li><a class="shortcut-button" href="<?php echo base_url();?>login"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/login_64.png" alt="icon" /><br />
			登录
		</span></a></li>
		<?php } ?>
		
	</ul><!-- End .shortcut-buttons-set -->
	
	<div class="clear" style="margin:0 0 12px 0;"><hr></div> <!-- End .clear -->

    <!-- 进出记录 与 库存统计 -->
	<div class="notification information png_bg">
		<a href="#" class="close"><img src="<?php echo base_url();?>resources/simpla/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
			<?php if(ifpermit($this->session->userdata('grade'),5))echo '进出记录 与 ';?>库存统计
		</div>
	</div>
	
	<ul class="shortcut-buttons-set">
		
        <?php if(ifpermit($this->session->userdata('grade'),5)){?>
		<li><a class="shortcut-button" href="<?php echo base_url();?>record/add"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/record_add_64.png" alt="icon" /><br />
			添加记录
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>record"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/record_list_64.png" alt="icon" /><br />
			记录列表
		</span></a></li>
		<?php } ?>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>stats/size"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/stats_size_64.png" alt="icon" /><br />
			尺码统计
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>stats/color"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/stats_color_64.png" alt="icon" /><br />
			颜色统计
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>stats/style"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/stats_style_64.png" alt="icon" /><br />
			款式统计
		</span></a></li>
		
	</ul><!-- End .shortcut-buttons-set -->
	
	<div class="clear"></div> <!-- End .clear -->

    <!-- 用户管理 与 备份 -->
    <?php if(ifpermit($this->session->userdata('grade'),6)||ifpermit($this->session->userdata('grade'),7)){?>
	<div class="notification information png_bg">
		<a href="#" class="close"><img src="<?php echo base_url();?>resources/simpla/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
			<?php if(ifpermit($this->session->userdata('grade'),6))echo '用户管理';?>
			<?php if(ifpermit($this->session->userdata('grade'),6)&&ifpermit($this->session->userdata('grade'),7))echo ' 与 ';?>
            <?php if(ifpermit($this->session->userdata('grade'),7))echo '备份';?>
		</div>
	</div>
	
	<ul class="shortcut-buttons-set">
		
        <?php if(ifpermit($this->session->userdata('grade'),6)){?>
		<li><a class="shortcut-button" href="<?php echo base_url();?>user/add"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/user_add_64.png" alt="icon" /><br />
			添加用户
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>user"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/user_list_64.png" alt="icon" /><br />
			用户列表
		</span></a></li>
		<?php } ?>
		
        <?php if(ifpermit($this->session->userdata('grade'),7)){?>
		<li><a class="shortcut-button" href="<?php echo base_url();?>bak/daily"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/bak_daily_64.png" alt="icon" /><br />
			当天库存表
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>bak/record"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/bak_record_64.png" alt="icon" /><br />
			进出记录表
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>bak/style"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/bak_style_64.png" alt="icon" /><br />
			款式统计表
		</span></a></li>
		<?php } ?>
		
	</ul><!-- End .shortcut-buttons-set -->
	<?php } ?>
	
	<div class="clear"></div> <!-- End .clear -->

    <!-- 设置 -->
    <?php if(ifpermit($this->session->userdata('grade'),8)){?>
	<div class="notification information png_bg">
		<a href="#" class="close"><img src="<?php echo base_url();?>resources/simpla/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
            设置
		</div>
	</div>
	
	<ul class="shortcut-buttons-set">
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>setting/general"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/setting_64.png" alt="icon" /><br />
			通用设置
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>client"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/client_64.png" alt="icon" /><br />
			客户管理
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>code/color"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/code_color_64.png" alt="icon" /><br />
			颜色代码
		</span></a></li>
		
		<li><a class="shortcut-button" href="<?php echo base_url();?>code/size"><span>
			<img src="<?php echo base_url();?>resources/simpla/images/icons/code_size_64.png" alt="icon" /><br />
			尺寸代码
		</span></a></li>
		
	</ul><!-- End .shortcut-buttons-set -->
	<?php } ?>
	
	<div class="clear"></div> <!-- End .clear -->

<?php
include_once ('tpl.footer.php');
?>
