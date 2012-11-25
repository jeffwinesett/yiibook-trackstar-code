<?php
$this->breadcrumbs=array(
	'Sys Messages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SysMessage', 'url'=>array('index')),
	array('label'=>'Create SysMessage', 'url'=>array('create')),
	array('label'=>'View SysMessage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SysMessage', 'url'=>array('admin')),
);
?>

<h1>Update SysMessage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>