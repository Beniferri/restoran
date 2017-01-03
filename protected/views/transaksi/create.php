<?php
/* @var $this TagihanController */
/* @var $model Tagihan */

$this->breadcrumbs = array(
    'Tagihan' => array('index'),
    'Tambah',
);

?>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-briefcase"></i> Transaksi Penjualan</h4>
        </div>
        <div class="panel-body">
            <?php echo $this->renderPartial('_form', array('model' => $model, 'promocode' => $promocode)); ?>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('.page-container').toggleClass('hidden-sidebar');
            $('.sidebar').hide();
        });
    </script>