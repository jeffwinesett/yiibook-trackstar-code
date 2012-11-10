<?php
$this->breadcrumbs=array(
	'Sys Messages',
);

$this->menu=array(
	array('label'=>'Create SysMessage', 'url'=>array('create')),
	array('label'=>'Manage SysMessage', 'url'=>array('admin')),
);
?>

<h1>Sys Messages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
