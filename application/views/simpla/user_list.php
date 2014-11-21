<?php
include_once ('tpl.header.php');

include_once ('tpl.side.php');
?>
<script type="text/javascript">
$(document).ready(function(){
    $(".del").click(function(){
        if(confirm("确认删除？")==false){
            return false;
        }
    });
    $("#reset").click(function(){
        $("input.search-input").attr("value","");
    });
});
</script>
<div id="main-content"> <!-- Main Content Section with everything -->
	
	<noscript> <!-- Show a notification if the user has disabled javascript -->
		<div class="notification error png_bg">
			<div>
				您的浏览器不支持或已关闭Javascript. 请<a href="http://www.google.cn/intl/zh-CN/chrome/browser/" title="Upgrade to chrome">升级</a> 浏览器 或 <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">开启</a> Javascript.
			</div>
		</div>
	</noscript>
	
	<div class="clear"></div> <!-- End .clear -->
	
	<div class="content-box column-left"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>用户列表</h3>
			
			<ul class="content-box-tabs">
				<li><a href="#tab1" class="default-tab">列&nbsp;表</a></li> <!-- href must be unique and match the id of target div -->
			</ul>
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
				<div class="notification search">
					<a href="#" class="close"><img src="<?php echo base_url('resources/simpla/images/icons/cross_grey_small.png');?>" title="Close this notification" alt="close" /></a>
					<div>
				        <form method="post" action="<?php echo base_url(); ?>user">
                        <strong>&nbsp;用户名&nbsp;</strong><input id="s_name" class="text-input search-input" type="text" name="s_name" size=5 value="<?php echo $_POST['s_name'];?>" />
                        <strong>&nbsp;昵称&nbsp;</strong><input id="s_nick" class="text-input search-input" type="text" name="s_nick" size=5 value="<?php echo $_POST['s_nick'];?>" />
                        <strong>&nbsp;部门&nbsp;</strong><input id="s_dept" class="text-input search-input" type="text" name="s_dept" size=5 value="<?php echo $_POST['s_dept'];?>" />
				        <input class="button" type="submit" name="search" value="搜索" /><button class="button" id="reset">重置</button>
                        
					</div>
				</div>
				<table>
					
					<thead>
						<tr>
						   <th>用户名</th>
						   <th>昵称</th>
						   <th>部门</th>
						   <th>备注</th>
						   <th>操作</th>
						</tr>
						
					</thead>
				 
					<tfoot>
						<tr>
							<td colspan="6">
								<div class="pagination">
							        <?php echo $this->pagination->create_links();?>	
								</div> <!-- End .pagination -->
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
				 
					<tbody>
						<?php foreach ($user as $user_i): ?>
						<tr>
							<td><?php echo $user_i['name'] ?></td>
							<td><?php echo $user_i['nick'] ?></td>
							<td><?php echo $user_i['dept'] ?></td>
							<td><?php echo $user_i['remark'] ?></td>
							<td>
								<!-- Icons -->
								 <a href="<?php echo base_url('user');?>/edit/<?php echo $user_i['name'] ?>" title="Edit"><img src="<?php echo base_url('resources/simpla/images/icons/pencil.png');?>" alt="Edit" /></a>
								 <a class="del" href="<?php echo base_url('user');?>/del/<?php echo $user_i['name'] ?>" title="Delete"><img src="<?php echo base_url('resources/simpla/images/icons/cross.png');?>" alt="Delete" /></a> 
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
					
				</table>
				
			</div> <!-- End #tab1 -->    
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
<?php
include_once ('tpl.footer.php');
?>
