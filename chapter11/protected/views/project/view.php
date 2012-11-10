	<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
	array('label'=>'Create Issue', 'url'=>array('issue/create', 'pid'=>$model->id)),
);

if(Yii::app()->user->checkAccess('createUser',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'Add User To Project', 'url'=>array('adduser', 'id'=>$model->id));
}

?>

<h1>View Project #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>

<br />
<h1>Project Issues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$issueDataProvider,
	'itemView'=>'/issue/_view',
)); ?>

<?php 
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Recent Comments On This Project',
	));  
	
	$this->widget('RecentCommentsWidget', array('projectId'=>$model->id));

	$this->endWidget(); 
?>


