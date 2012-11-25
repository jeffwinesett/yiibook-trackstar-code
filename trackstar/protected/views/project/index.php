<?php
$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<?php if($sysMessage != null):?>
    <div class="sys-message">
        <?php echo $sysMessage; ?>
    </div>
<?php
	Yii::app()->clientScript->registerScript(
	   'fadeAndHideEffect',
	   '$(".sys-message").animate({opacity: 1.0}, 5000).fadeOut("slow");'
	);
endif; ?>



<h1>Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php 
//fragment caching approach
$key = "TrackStar.ProjectListing.RecentComments";
//if($this->beginCache($key, array('duration'=>120))) {
if($this->beginCache($key, array('dependency'=>array(
			'class'=>'system.caching.dependencies.CDbCacheDependency',
			'sql'=>'SELECT MAX(update_time) FROM tbl_comment')))) {
 	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Recent Comments',
	));  
	$this->widget('RecentCommentsWidget');
	$this->endWidget();
	$this->endCache(); 
}



	/*
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Recent Comments',
	));  

	$this->widget('RecentCommentsWidget');

	$this->endWidget();
	*/ 
?>

