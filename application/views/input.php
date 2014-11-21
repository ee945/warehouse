<?php
include_once ('tpl.header.php');
include_once ('tpl.side.php');
?>
<div id="main">
<div id="title"><?php echo $title;?></div>
<div id="content">
<form method="post" action="<?php echo base_url(); ?>record/<?php echo $action;?>">
<p>
<span>日期</span><input type="text" name="date" value="<?php echo $date;?>"><input type="text" name="id" value="<?php echo $id;?>" hidden>
</p>
<p>
<span>品名</span><input type="text" name="style" value="<?php echo $style;?>">
</p>
<p>
<span>颜色</span><input type="text" name="color" value="<?php echo $color;?>">
</p>
<p>
<span>尺码</span><input type="text" name="size" value="<?php echo $size;?>">
</p>
<p>
<span>数量</span><input type="text" name="num" value="<?php echo $num;?>">
</p>
<p>
<span>客户</span><input type="text" name="client" value="<?php echo $client;?>">
</p>
<p>
<span>备注</span><input type="text" name="remark" value="<?php echo $remark;?>">
</p>
<p>
<span>&nbsp;&nbsp;</span><input type="submit" value="<?php echo $actname;?>">
</p>
</form>
</div>
</div>
<?php
include_once ('tpl.footer.php');
?>
