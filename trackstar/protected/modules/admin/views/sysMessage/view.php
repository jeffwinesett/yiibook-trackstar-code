<?php
$this->breadcrumbs=array(
	'Sys Messages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SysMessage', 'url'=>array('index')),
	array('label'=>'Create SysMessage', 'url'=>array('create')),
	array('label'=>'Update SysMessage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SysMessage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SysMessage', 'url'=>array('admin')),
);
?>

<h1>View SysMessage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'message',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
