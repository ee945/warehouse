<?php
include_once ('tpl.header.php');

include_once ('tpl.side.php');
?>
<script type="text/javascript">
$(document).ready(function(){
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
			
			<h3>库存统计 - 颜色</h3>
			
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
				        <form method="post" action="<?php echo base_url(); ?>stats/color">
                        <strong>&nbsp;款式&nbsp;</strong><input id="s_style" class="text-input search-input" type="text" name="s_style" size=5 value="<?php echo $_POST['s_style'];?>" />
                        <strong>&nbsp;颜色&nbsp;</strong><input id="s_color" class="text-input search-input" type="text" name="s_color" size=5 value="<?php echo $_POST['s_color'];?>" />
				        <input class="button" type="submit" name="search" value="搜索" /><button class="button" id="reset">重置</button>
                        
					</div>
				</div>
				<table>
					
					<thead>
						<tr>
						   <th>款式</th>
						   <th>颜色</th>
						   <th>数量</th>
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
						<?php foreach ($stats as $stats_i): ?>
						<tr>
							<td><?php echo $stats_i['style'] ?></td>
							<td><?php echo $stats_i['color'] ?></td>
							<td><?php echo $stats_i['num'] ?></td>
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
