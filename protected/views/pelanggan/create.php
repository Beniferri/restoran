<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */

$this->breadcrumbs=array(
	'Pelanggan' => array('view'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Daftar Pelanggan', 'url'=>array('view')),
);
?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title">Tambah Pelanggan</h4>
	</div>
	<div class="panel-body">
		<?php if(Yii::app()->user->hasFlash('create')): ?>
			<div class="alert alert-success mb10">
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				<?php echo Yii::app()->user->getFlash('create'); ?>
			</div>
		<?php endif; ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>