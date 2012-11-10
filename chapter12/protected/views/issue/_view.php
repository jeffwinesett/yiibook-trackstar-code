<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('issue/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php //echo CHtml::encode($data->type_id); ?>
	<?php echo CHtml::encode($data->getTypeText()); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php //echo CHtml::encode($data->status_id); ?>
	<?php echo CHtml::encode($data->getStatusText()); ?>
	

</div>

