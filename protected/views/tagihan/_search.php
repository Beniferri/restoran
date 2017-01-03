<?php
/* @var $this TagihanController */
/* @var $model Tagihan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group col-md-2">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

<!-- 	<div class="form-group col-md-2">
		<?php echo $form->label($model,'nomor_tagihan'); ?>
		<?php echo $form->textField($model,'nomor_tagihan',array('size'=>32,'maxlength'=>32)); ?>
	</div> -->

<!-- 	<div class="form-group col-md-2">
		<?php echo $form->label($model,'id_pelanggan'); ?>
		<?php echo $form->textField($model,'id_pelanggan'); ?>
	</div>
 -->
	<div class="form-group col-md-4">
		<?php echo $form->label($model,'id_pelanggan',array('class'=>'control-label')); ?>
		<?php $this->widget('ext.bootstrap-select.TbSelect',array(
					'model' => $model,
					'attribute' => 'id_pelanggan',
					'data' => Pelanggan::list_items('Pilih Pelanggan'),
					'htmlOptions' => array(
					//'multiple' => true,
					'data-live-search'=>true,
					'class'=>'form-control no-margin',
				),
			)); 
		?>
	</div>

<!-- 	<div class="row">
		<?php echo $form->label($model,'total_tagihan'); ?>
		<?php echo $form->textField($model,'total_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_tagihan'); ?>
		<?php echo $form->textField($model,'status_tagihan',array('size'=>16,'maxlength'=>16)); ?>
	</div>
 -->
<!-- 	<div class="form-group col-md-2">
		<?php echo $form->label($model,'tanggal_pembayaran'); ?>
		<?php echo $form->textField($model,'tanggal_pembayaran'); ?>
	</div> -->

		<div class="form-group col-md-4">
		<label class="control-label col-sm-12">Jarak Waktu</label>
		<div class="col-sm-6">
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'date_from', //attribute name
					'options'=>array(
						'showAnim'=>'fold',
						'dateFormat'=>'yy-mm-dd',
						'changeMonth' => 'true',
						'changeYear'=>'true',
						'constrainInput' => 'false'
					),
					'htmlOptions'=>array(
						'class'=>'form-control',
						'placeholder'=>'Dari',
					),
				));
			?>
		</div>

				<div class="col-sm-6">
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'date_to', //attribute name
					'options'=>array(
						'showAnim'=>'fold',
						'dateFormat'=>'yy-mm-dd',
						'changeMonth' => 'true',
						'changeYear'=>'true',
						'constrainInput' => 'false'
					),
					'htmlOptions'=>array(
						'class'=>'form-control',
						'placeholder'=>'Sampai',
					),
				));
			?>
		</div>
	</div>


<!-- 	<div class="form-group col-md-2">
		<?php echo $form->label($model,'tanggal_input'); ?>
		<?php echo $form->textField($model,'tanggal_input'); ?>
	</div> -->

<!-- 	<div class="row buttons">
		<?php echo CHtml::submitButton('Cari'); ?>
	</div> -->

		<div class="form-group col-md-12">
		<?php echo CHtml::submitButton('Cari',array('class'=>'btn btn-success','style'=>'min-width:120px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->