</head>
<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->	
<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
	
	<h1 id="sidebar-title"><a href="#">Admin</a></h1>
  
	<!-- Logo (221px wide) -->
	<a href="<?php echo base_url();?>"><img id="logo" src="<?php echo base_url();?>resources/simpla/images/logo.png" alt="Simpla Admin logo" /></a>
  
	<!-- Sidebar Profile links -->
	<div id="profile-links">
		你好，<a href="<?php echo base_url();?>user/edit/<?php echo $this->session->userdata('name');?>" title="Edit your profile"><?php if($this->session->userdata('name')){echo $this->session->userdata('name');}else{echo "游客";}?></a>！ <br />你有 
        <a href="#messages" rel="modal" title="3 Messages">3</a> 条信息
		<br />
		<a href="<?php echo base_url();?>" title="View the Site">首页</a> | <a href="<?php echo base_url();?>login/out" title="Sign Out">退出</a>
	</div>
	
	<ul id="main-nav">  <!-- Accordion Menu -->
		
		<li>
			<a href="<?php echo base_url();?>login/quickstart" class="nav-top-item no-submenu <?php echo $menu_quickstart; ?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
				快速导航
			</a>       
		</li>
		
        <?php if(ifpermit($this->session->userdata('grade'),5)){?>
		<li> 
			<a href="#" class="nav-top-item <?php echo $menu_record; ?>"> <!-- Add the class "current" to current menu item -->
			进出记录
			</a>
			<ul>
				<li><a <?php echo $menu_record_list; ?> href="<?php echo base_url();?>record">记录列表</a></li> <!-- Add class "current" to sub menu items also -->
				<li><a <?php echo $menu_record_add; ?> href="<?php echo base_url();?>record/add">添加记录</a></li>
			</ul>
		</li>
		<?php } ?>
		
		<li>
			<a href="#" class="nav-top-item <?php echo $menu_stats; ?>">
				库存统计
			</a>
			<ul>
				<li><a <?php echo $menu_stats_size; ?> href="<?php echo base_url();?>stats/size">尺码统计</a></li>
				<li><a <?php echo $menu_stats_color; ?> href="<?php echo base_url();?>stats/color">颜色统计</a></li>
				<li><a <?php echo $menu_stats_style; ?> href="<?php echo base_url();?>stats/style">款式统计</a></li>
			</ul>
		</li>

        <?php if(ifpermit($this->session->userdata('grade'),6)){?>
		<li>
			<a href="#" class="nav-top-item <?php echo $menu_user; ?>">
				用户管理
			</a>
			<ul>
				<li><a <?php echo $menu_user_add; ?> href="<?php echo base_url();?>user/add">添加用户</a></li>
				<li><a <?php echo $menu_user_list; ?> href="<?php echo base_url();?>user">用户列表</a></li>
			</ul>
		</li>
		<?php } ?>

        <?php if(ifpermit($this->session->userdata('grade'),7)){?>
		<li>
			<a href="#" class="nav-top-item <?php echo $menu_bak; ?>">
				备份
			</a>
			<ul>
				<li><a <?php echo $menu_bak_daily; ?> href="<?php echo base_url();?>bak/daily">当天库存表</a></li>
				<li><a <?php echo $menu_bak_record; ?> href="<?php echo base_url();?>bak/record">进出记录表</a></li>
				<li><a <?php echo $menu_bak_style; ?> href="<?php echo base_url();?>bak/style">款式统计表</a></li>
			</ul>
		</li>
		<?php } ?>

		<!-- 系统设置 -->
        <?php if(ifpermit($this->session->userdata('grade'),8)){?>
		<li>
			<a href="#" class="nav-top-item <?php echo $menu_setting; ?>">
				设置
			</a>
			<ul>
				<li><a <?php echo $menu_set_gen; ?> href="<?php echo base_url();?>setting/general">通用设置</a></li>
				<li><a <?php echo $menu_client; ?> href="<?php echo base_url();?>client">客户管理</a></li>
				<li><a <?php echo $menu_code_color; ?> href="<?php echo base_url();?>code/color">颜色代码</a></li>
				<li><a <?php echo $menu_code_size; ?> href="<?php echo base_url();?>code/size">尺寸代码</a></li>
			</ul>
		</li>      
		<?php } ?>
	</ul> <!-- End #main-nav -->
	
	<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
		
		<h3>3 Messages</h3>
	 
		<p>
			<strong>17th May 2009</strong> by Admin<br />
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
	 
		<p>
			<strong>2nd May 2009</strong> by Jane Doe<br />
			Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
	 
		<p>
			<strong>25th April 2009</strong> by Admin<br />
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
		
		<form action="#" method="post">
			
			<h4>New Message</h4>
			
			<fieldset>
				<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
			</fieldset>
			
			<fieldset>
			
				<select name="dropdown" class="small-input">
					<option value="option1">Send to...</option>
					<option value="option2">Everyone</option>
					<option value="option3">Admin</option>
					<option value="option4">Jane Doe</option>
				</select>
				
				<input class="button" type="submit" value="Send" />
				
			</fieldset>
			
		</form>
		
	</div> <!-- End #messages -->
	
</div></div> <!-- End #sidebar -->
