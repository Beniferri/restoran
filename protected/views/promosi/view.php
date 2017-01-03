<?php
$this->breadcrumbs = array(
	'Promosi' => array('view'),
	'View',
);

$this->menu=array(
	array('label'=>'Daftar Promosi', 'url'=>array('view'),'visible'=>UserAccess::ruleAccess('read_p')),
	array('label'=>'Tambah Promosi', 'url'=>array('create'), 'visible'=>UserAccess::ruleAccess('create_p')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('promosi-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title"><?php echo Yii::t('global','Daftar');?> Promosi</h4>
	</div>

		<div class="table-responsive">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'promosi-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass'=>'table table-striped mb30',
				'afterAjaxUpdate' => 'reinstallDatePicker', // (#1
				'columns'=>array(
					'id',
					'kode_promosi',
					array(
						'name'=>'jenis_promosi',
						'value'=>'$data->jenis_promosi',
						'filter'=>$model->items(),
						'type'=>'raw',
						'htmlOptions'=>array('style'=>'text-align:center;'),
					),
					'nilai_promosi',
					'maksimal_digunakan',
					'telah_digunakan',
					array(
						'name'=>'status_promosi',
						'value'=>'$data->status_promosi',
						'filter'=>$model->listStatus,
						'type'=>'raw',
						'htmlOptions'=>array('style'=>'text-align:center;'),
					),
					/*'produk_yang_terdiskon',
					'tanggal_mulai_promosi',
					'tanggal_berakhir_promosi',
					'tanggal_input',
					'user_input',
					*/
					array(
						'class'=>'CButtonColumn',
						'template'=>'{update}{delete}',
						'buttons'=>array
						(
							'update'=>array(
								'imageUrl'=>false,
								'label'=>'<i class="fa fa-pencil"></i>',
								'options'=>array('title'=>'Update'),
								'visible'=>'UserAccess::ruleAccess(\'update_p\')',
							),
							'delete'=>array(
								'imageUrl'=>false,
								'label'=>'<i class="fa fa-trash-o"></i>',
								'options'=>array('title'=>'Delete'),
								'visible'=>'UserAccess::ruleAccess(\'delete_p\')',
							),
						),
						'visible'=>UserAccess::ruleAccess('update_p'),
						'htmlOptions'=>array('style'=>'width:10%;','class'=>'table-action'),
					),
				),
			)); ?>
		</div>
	</div>
	<?php
// (#5)
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_tanggal_input').datepicker();
	$('input[type=text]').addClass('form-control');
	$('select').addClass('form-control');
	$('.yiiPager').addClass('dataTables_paginate paging_full_numbers');
	$('.dataTables_paginate').removeClass('yiiPager');
}
");
?>
