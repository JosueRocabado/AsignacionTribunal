<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AreaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
  ]); ?>

  <?= $form->field($model, 'idarea') ?>
  <?= $form->field($model, 'nombre_area') ?>
  <?= $form->field($model, 'descripcion_area') ?>
  <?= $form->field($model, 'area_idarea') ?>

    <div class="form-group">
      <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
      <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
