<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsrRol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usr-rol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuario_idusuario')->textInput() ?>

    <?= $form->field($model, 'rol_idrol')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
