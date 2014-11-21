<?php
include_once ('tpl.header.php');
include_once ('tpl.side.php');
?>
<div id="main">
<div id="title"><?php echo $title; ?></div>
<div id="content">
<div id="mainview">
<p><?php if($record['num']>0){
    echo "进库";
}else{
    echo "出库";
} ?></p>
<p><?php echo $record['style'] ?></p>
<p><?php echo $record['color'] ?></p>
<p><?php echo $record['size'] ?></p>
<p><?php echo $record['num'] ?></p>
<p><?php echo $record['client'] ?></p>
<p><?php echo $record['location'] ?></p>
<p><?php echo $record['date'] ?></p>
<p><?php echo $record['remark'] ?></p>
<p><?php echo $record['regtime'] ?></p>
<p><a href="<?php echo base_url('record');?>"><button>返回</button></a></p>
<div>
</div>
</div>
<?php
include_once ('tpl.footer.php');
?>
