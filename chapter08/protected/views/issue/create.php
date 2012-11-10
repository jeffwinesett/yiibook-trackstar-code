<?php
$this->breadcrumbs=array(
	'Issues'=>array('index', 'pid'=>$model->project_id),
	'Create Issue',
);

$this->menu=array(
	array('label'=>'List Issues', 'url'=>array('index', 'pid'=>$model->project_id)),
	array('label'=>'Manage Issues', 'url'=>array('admin', 'pid'=>$model->project_id)),
);
?>

<h1>Create Issue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>