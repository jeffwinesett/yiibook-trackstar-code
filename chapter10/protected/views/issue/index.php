<?php
$this->breadcrumbs=array(
	'Issues',
);

$this->menu=array(
	//array('label'=>'Manage Issue', 'url'=>array('admin')),
);
?>

<h1>Issues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
