<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;

use app\models\Rol;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-form">
    <div class="well">
      <h3><?= $mensaje ?></h3>
      <h3 class="text-center">REGISTRO DE DOCENTE</h3>
       <br><br>
    <?php
    $form = ActiveForm::begin(
                    [
                        'id'=>'form_id',
                        //'name'=>'formulario',
                        "method" => "post",
                        //"id" => "usuario_insertar",
                        "enableAjaxValidation" => true,
                        //'onsubmit'=>"return alerta()"
                    ]
    );
    ?>
      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
               <?= $form->field($model, 'nombre_doc')->textInput(['maxlength' => true ,'id'=>'nombre','options' => [] ]) ?>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
              <?= $form->field($model, 'paterno_doc')->textInput(['maxlength' => true]) ?>
         
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
              <?= $form->field($model, 'materno_doc')->textInput(['maxlength' => true]) ?>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
           <?= $form->field($model, 'correo_doc')->textInput() ?>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-8">
              <?= $form->field($model, 'titulo_doc')->textInput(['maxlength' => true]) ?>
              </div>
      </div>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
             <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'', 'onClick'=>'alerta(this)']) ?>  
            </div> 
        </div>
     </div>

    <?php ActiveForm::end(); ?>
    </div> 
</div>

