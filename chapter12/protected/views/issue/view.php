<?php
$this->breadcrumbs=array(
	$model->project->name=>array('project/view', 'id'=>$model->project->id),
	'Issues'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Issues', 'url'=>array('index', 'pid'=>$model->project->id)),
	array('label'=>'Create Issue', 'url'=>array('create', 'pid'=>$model->project->id)),
	array('label'=>'Update Issues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Issue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Issues', 'url'=>array('admin', 'pid'=>$model->project->id)),
);

?>

<h1>View Issue #<?php echo $model->id; ?></h1>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'name',
			'description',
			array(        
				'name'=>'type_id',
	    		'value'=>CHtml::encode($model->getTypeText())
			),
			array(        
				'name'=>'status_id',
		    	'value'=>CHtml::encode($model->getStatusText())
			),
			array(        
				'name'=>'owner_id',
				 'value'=>isset($model->owner)?CHtml::encode($model->owner->username):"unknown"
		    		
			),
			array(        
				'name'=>'requester_id',
		    	'value'=>isset($model->requester)?CHtml::encode($model->requester->username):"unknown"
			),

		),
	)); ?>

   <div id="comments">
		<?php if($model->commentCount>=1): ?>
			<h3>
				<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
			</h3>

			<?php $this->renderPartial('_comments',array(
				'comments'=>$model->comments,
			)); ?>
		<?php endif; ?>

		<h3>Leave a Comment</h3>

		<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
			</div>
		<?php else: ?>
			<?php $this->renderPartial('/comment/_form',array(
				'model'=>$comment,
			)); ?>
		<?php endif; ?>

	</div>
