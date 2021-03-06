<?php
if (Yii::app()->user->hasState('items_belanja')):
    $no = 1;
    $tot_qty = 0;
    $tot_disc = 0;
    $tot_pay = 0;
    foreach (Yii::app()->user->getState('items_belanja') as $index => $data) {
        ?>
        <?php
        $harga_bruto = $data['unit_price'] * $data['qty'];
        $harga_netto = $harga_bruto - $data['discount'];
        $discount = $harga_bruto - $harga_netto;
        ?>
        <tr class="<?php echo ($no % 2 > 0) ? 'even' : 'odd'; ?>">
            <td style="text-align:center;"><?php echo $no; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td style="text-align:right;"><?php echo number_format($data['unit_price'], 0, ',', '.'); ?></td>
            <td style="text-align:center;"><?php echo CHtml::textField('qty', $data['qty'], array('size' => 3, 'class' => 'text-center', 'onchange' => 'pushQty(' . $index . ',this,"' . Yii::app()->createUrl('/transaksi/updateQty') . '")')); ?></td>
            <td style="text-align:right;" id="discount-<?php echo $index; ?>" class="overwrite">
                <?php echo CHtml::textField('discount', $this->money_format($discount), array('class' => 'form-control text-right', 'maxlength' => 10, 'size' => 10, 'rel_id' => $index)); ?>
            </td>
            <td style="text-align:right;"
                id="total-item-<?php echo $index; ?>"><?php echo number_format($harga_netto, 0, ',', '.'); ?></td>
            <td style="text-align:center;"
                class="table-action"><?php echo CHtml::link('<i class="fa fa-trash-o"></i>', 'javascript:void(0);', array('onclick' => 'deleteItem("' . $index . '");')); ?></td>
        </tr>
        <?php
        $no++;
    } ?>
    <?php
endif;
?>
<script type="text/javascript">
    $(function () {
        //$('input[id="discount"]').maskMoney({symbol:'', showSymbol:false, thousands:'.', decimal:',', symbolStay: true,precision:0});
        $('input[id="discount"]').keypress(function (e) {
            if (e.which == 13) {
                pushDiscount(this);
                return false;
            }
        });
    });
</script>
