<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

//echo $id_titulo;
?>
<div class="row">
    <div class="well">
        <div class="well">
            <h4 class="text-center text-info">LISTA PARA ASIGNAR A TRIBUNALES </h4>
             <?php $form = ActiveForm::begin([
                    //'action' => ['lista_profesionales'],
                    //'id_titulo'=>$id_titulo,
                    'method' => 'post',
    ]); ?>
             <?= $form->field($model, 'fecha_registro')->textInput(['maxlength' => true]) ?>
     
             <h5 class="text-center text-info"> <strong>LISTA DE PROFESIONALES SEGUN EL AREA</strong> </h5>
             <table class="table table-striped">
                 <tr>
                     <td class="text-info"> <strong>PROFESIONAL</strong></td>
                     <td class="text-info"><strong>AREA</strong></td>
                 </tr>
                
                 <?php 
                  $obtener_lista_titulo= $model->obtener_lista_titulo($id_titulo);
                  foreach($obtener_lista_titulo as $id_area){
                      $id_nombre = $model->lista_docentes_asignar($id_area['idarea']);
                      foreach($id_nombre as $nombre_docente){
                  ?>
                    <tr>
                        <td>
                            <input type="checkbox" name=mischecks[] value="<?php echo $nombre_docente['iddocente'] ?>"> <?php echo $nombre_docente['nombre_doc'].' '.$nombre_docente['paterno_doc'] .' '.$nombre_docente['materno_doc']?>
                        </td>
                        <td>
                            <?php echo $nombre_docente['nombre_area']; ?>
                        </td>
                    </tr>
                  <?php } ?>
                  <?php } ?>
                  
                 <?php ?>
                 <?php ?>
             </table>
             
             <br>
             <div class="form-group">
          <?=
                    Html::submitButton('ASIGNAR', [ 
                        'class' => 'btn btn',
                        'style' => 'width:250px; background-color: #959292;',

                    ])
                    ?>
        </div>

    <?php ActiveForm::end(); ?> 
    </div>    
</div>