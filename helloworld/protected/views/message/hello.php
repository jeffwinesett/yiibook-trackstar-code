<?php
$this->breadcrumbs=array(
	'Message'=>array('/message'),
	'Hello',
);?>
<h1>Hello World!</h1>
<h3><?php echo $time; ?></h3>
<p><?php echo CHtml::link('Goodbye',array('message/goodbye')); ?></p>  
<!-- comment out the above line, and uncomment the following line for the 'try it yourself' exercise -->
<!--
<h3><?php //echo $this->time; ?></h3>
-->
