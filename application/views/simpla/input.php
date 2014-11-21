<?php
include_once ('tpl.header.php');
include_once ('tpl.side.php');
?>
<script type="text/javascript">
$(document).ready(function(){
    $("input#style").focus();
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
	<?php if($noti=="success")
    {
        echo "<div class='notification success png_bg'>
		<a href='#' class='close'><img src=\"".base_url('resources/simpla/images/icons/cross_grey_small.png')."\" title='Close this notification' alt='close' /></a>
		<div>
			操作成功！
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
	<?php if($noti=="out")
    {
        echo "<div class='notification error png_bg'>
		<a href='#' class='close'><img src=\"".base_url('resources/simpla/images/icons/cross_grey_small.png')."\" title='Close this notification' alt='close' /></a>
		<div>
			<b>添加失败！库存不足！</b>
		</div>
	</div>";
    }?>    

	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>添加记录</h3>
			
			<ul class="content-box-tabs">
				<li><a href="#tab1" class="default-tab">添&nbsp;加</a></li> <!-- href must be unique and match the id of target div -->
			</ul>
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
			<div class="tab-content default-tab" id="tab2">
			
				<form method="post" action="<?php echo base_url(); ?>record/<?php echo $action;?>">
					
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						
						<p>
							<label>日&nbsp;期&nbsp;<span style="color:#ff0000">*</span></label>
							<input id="date" class="text-input small-input" type="text" name="date" value="<?php echo $date;?>" />
                            <?php echo form_error('date',"<span class='input-notification error png_bg'>",'</span>'); ?><input type="text" name="id" value="<?php echo $id;?>" hidden> 
						</p>
						
						<p>
							<label>款&nbsp;式&nbsp;<span style="color:#ff0000">*</span></label>
							<input id="style" class="text-input small-input" type="text" name="style" value="<?php echo $style;?>" />
                            <?php echo form_error('style',"<span class='input-notification error png_bg'>",'</span>'); ?>
                            
						</p>
						
						<p>
							<label>颜&nbsp;色</label>
							<input id="color" class="text-input small-input" type="text" name="color" value="<?php echo $color;?>">
						</p>
						
						<p>
							<label>尺&nbsp;码</label>
							<input id="size" class="text-input small-input" type="text" name="size" value="<?php echo $size;?>">
						</p>
						
						<p>
							<label>数&nbsp;量&nbsp;<span style="color:#ff0000">*</span></label>
							<input id="num" class="text-input small-input" type="text" name="num" value="<?php echo $num;?>">
                            <?php echo form_error('num',"<span class='input-notification error png_bg'>",'</span>'); ?>

						</p>
						
						<p>
							<label>客&nbsp;户</label>
							<input id="client" class="text-input small-input" type="text" name="client" value="<?php echo $client;?>">
						</p>
												
						<p>
							<label>库&nbsp;位</label>
							<input id="location" class="text-input small-input" type="text" name="location" value="<?php echo $location;?>">
						</p>
												
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
	
<?php
include_once ('tpl.footer.php');
?>
