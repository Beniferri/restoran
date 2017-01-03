<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
$this->menu = array(
    array('label' => '<i class="fa fa-lock"></i> Halaman Login', 'url' => array('login')),
);
?>
<style>
div.absolute {
    position: relative;
    top: 50px;
    width: 100%;
    text-align: center;
}
</style>
<div class="page-header">
<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 mt50" id="div-for-form">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="fa fa-sign-in"></i>Login</h6>
        </div>
        <div class="panel-body">
            <?php if (Yii::app()->user->hasFlash('login')): ?>

                <div class="alert alert-info fade in widget-inner">
                    <?php
                    header('refresh: 2; url=' . Yii::app()->user->returnUrl);
                    echo Yii::app()->user->getFlash('login');
                    ?>
                </div>

            <?php endif; ?>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            )); ?>
            <p class="mt5 mb20">Silahkan masukkan username dan password Anda.</p>
            <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger alert-dismissible fade in', 'data-dismiss' => 'alert')); ?>

            <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
            </div>
            <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control pword', 'placeholder' => 'Password')); ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::submitButton(Yii::t('global', 'Login'), array('style' => 'min-width:100px;', 'id' => 'tombol', 'class' => 'btn btn-success btn-block')); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div><!-- panel-body -->
    </div>
</div><!-- div-for-form -->

<script type="text/javascript">
    $(function () {
        $('body').addClass('leftpanel-collapsed');
        $('input[id="LoginForm_username"]').focus();
    });
</script>
