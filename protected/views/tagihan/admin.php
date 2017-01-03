<?php
/* @var $this TagihanController */
/* @var $model Tagihan */

$this->breadcrumbs=array(
	'Tagihans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tagihan', 'url'=>array('index')),
	array('label'=>'Create Tagihan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tagihan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tagihans</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Pencarian','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tagihan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nomor_tagihan',
		'id_pelanggan',
		'total_tagihan',
		'status_tagihan',
		'tanggal_pembayaran',
		/*
		'tanggal_input',
		'user_input',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>