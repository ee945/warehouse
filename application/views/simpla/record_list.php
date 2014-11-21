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
	
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>进出库记录</h3>
			
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
				        <form method="post" action="<?php echo base_url(); ?>record">
                        <strong>状态&nbsp;</strong><select name="s_state"><option value="">&nbsp;</option><option value="进库">进库</option><option value="出库">出库</option></select>
                        <strong>&nbsp;款式&nbsp;</strong><input id="s_style" class="text-input search-input" type="text" name="s_style" size=5 value="<?php echo $_POST['s_style'];?>" />
                        <strong>&nbsp;颜色&nbsp;</strong><input id="s_color" class="text-input search-input" type="text" name="s_color" size=5 value="<?php echo $_POST['s_color'];?>" />
                        <strong>&nbsp;尺码&nbsp;</strong><input id="s_size" class="text-input search-input" type="text" name="s_size" size=5 value="<?php echo $_POST['s_size'];?>" />
                        <strong>&nbsp;客户&nbsp;</strong><input id="s_client" class="text-input search-input" type="text" name="s_client" size=5 value="<?php echo $_POST['s_client'];?>" />
                        <strong>&nbsp;库位&nbsp;</strong><input id="s_location" class="text-input search-input" type="text" name="s_location" size=5 value="<?php echo $_POST['s_location'];?>" />
                        <strong>&nbsp;日期&nbsp;</strong>
                        <input id="s_start_date" class="text-input search-input" type="text" name="s_start_date" size=6 value="<?php echo $_POST['s_start_date'];?>" />-
                        <input id="s_end_date" class="text-input search-input" type="text" name="s_end_date" size=6 value="<?php echo $_POST['s_end_date'];?>" />
				        <input class="button" type="submit" name="search" value="搜索" /><button class="button" id="reset">重置</button>
                        
					</div>
				</div>
				<table>
					
					<thead>
						<tr>
						   <th><input class="check-all" type="checkbox" /></th>
						   <th>状态</th>
						   <th>款式</th>
						   <th>颜色</th>
						   <th>尺码</th>
						   <th>数量</th>
						   <th>客户</th>
						   <th>库位</th>
						   <th>日期</th>
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
						<?php foreach ($record as $rec_i): ?>
						<tr>
							<td><input type="checkbox" /></td>
							<td><?php if($rec_i['num']>0){echo "<strong><span style='color:#00dd00;'>进 库</span></strong>";}else{echo "<strong><span style='color:#ff0000;'>出 库</span></strong>";} ?></td>
							<td><?php echo $rec_i['style'] ?></td>
							<td><?php echo $rec_i['color'] ?></td>
							<td><?php echo $rec_i['size'] ?></td>
							<td><?php echo $rec_i['num'] ?></td>
							<td><?php echo $rec_i['client'] ?></td>
							<td><?php echo $rec_i['location'] ?></td>
							<td><?php echo $rec_i['date'] ?></td>
							<td>
								<!-- Icons -->
								 <a href="<?php echo base_url('record');?>/edit/<?php echo $rec_i['id'] ?>" title="Edit"><img src="<?php echo base_url('resources/simpla/images/icons/pencil.png');?>" alt="Edit" /></a>
								 <a class="del" href="<?php echo base_url('record');?>/del/<?php echo $rec_i['id'] ?>" title="Delete"><img src="<?php echo base_url('resources/simpla/images/icons/cross.png');?>" alt="Delete" /></a> 
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
