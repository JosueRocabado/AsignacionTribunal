<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddocente') ?>

    <?= $form->field($model, 'nombre_doc') ?>

    <?= $form->field($model, 'paterno_doc') ?>

    <?= $form->field($model, 'materno_doc') ?>

    <?= $form->field($model, 'titulo_doc') ?>

    <?php // echo $form->field($model, 'correo_usr') ?>

    <?php // echo $form->field($model, 'usuario') ?>

    <?php // echo $form->field($model, 'contrasenia') ?>

    <?php // echo $form->field($model, 'conf_contrasenia') ?>

    <?php // echo $form->field($model, 'activate') ?>

    <?php // echo $form->field($model, 'accessToken') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
