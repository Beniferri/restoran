<?php
$this->breadcrumbs = array(
    Yii::t('global', 'Dashboard'),
);

$this->menu = array(
    array('label' => 'Transaksi Baru', 'url' => array('transaksi/create')),
);
?>
<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">Antrian Laporan</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider' => $dataProvider,
                    'itemsCssClass' => 'table table-striped mb30',
                    'id' => 'order-grid',
                    'afterAjaxUpdate' => 'reloadGrid',
                    'columns' => array(
                        array(
                            'value' => '$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
                            'htmlOptions' => array('style' => 'text-align:center;'),
                        ),
                        array(
                            'header' => 'Nomor Tagihan',
                            'type' => 'raw',
                            'value' => 'CHtml::link($data[\'tagihan\'][\'nomor_tagihan\'],array(\'tagihan/update\',\'id\'=>$data[\'tagihan\'][\'id\']))'
                        ),
                        array(
                            'header' => 'Tanggal Input',
                            'type' => 'raw',
                            'value' => '$data[\'tagihan\'][\'tanggal_input\']'
                        ),
                        array(
                            'header' => 'Diinput Oleh',
                            'type' => 'raw',
                            'value' => 'User::find($data[\'tagihan\'][\'user_input\'])->username'
                        ),
                    ),
                )); ?>
            </div>
            <?php if ($dataProvider->totalItemCount > 0): ?>
                <?php echo CHtml::link('Upload Laporan', 'javascript:void(0);', array('class' => 'btn btn-success', 'id' => 'upload-laporan')); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#upload-laporan').click(function () {
        $.ajax({
            'beforeSend': function () {
                Loading.show();
            },
            'complete': function () {
                Loading.hide();
            },
            'url': "<?php echo Yii::app()->createUrl('/laporan/push');?>",
            'type': 'post',
            'dataType': 'json',
            'async': true,
            'success': function (data) {
                if (data.status == 'success') {
                    $('.table-responsive').html(data.div);
                }
            }
        });
        return false;
    });
</script>
