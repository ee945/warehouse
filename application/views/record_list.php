<?php
include_once ('tpl.header.php');
include_once ('tpl.side.php');
?>
<div id="main">
<div id="title"><?php echo $title; ?></div>
<div id="content">
<div id="search"><div>
<div id="maintab">
<table>
<tr>
<th>进出</th>
<th>品名</th>
<th>颜色</th>
<th>尺码</th>
<th>数量</th>
<th>客户</th>
<th>库位</th>
<th>日期</th>
<th>&nbsp;</th>
</tr>
<?php foreach ($record as $rec_i): ?>
<tr>
<td><?php if($rec_i['num']>0){
    echo "进库";
}else{
    echo "出库";
} ?></td>
<td><?php echo $rec_i['style'] ?></td>
<td><?php echo $rec_i['color'] ?></td>
<td><?php echo $rec_i['size'] ?></td>
<td><?php echo $rec_i['num'] ?></td>
<td><?php echo $rec_i['client'] ?></td>
<td><?php echo $rec_i['location'] ?></td>
<td><?php echo $rec_i['date'] ?></td>
<td><a href="<?php echo base_url('record');?>/view/<?php echo $rec_i['id'] ?>"><button>查看</button></a></td>
</tr>
<?php endforeach ?>
</table>
<div>
</div>
</div>
<?php
include_once ('tpl.footer.php');
?>
