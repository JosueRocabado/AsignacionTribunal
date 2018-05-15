<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
//print_r($model);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = 'LISTA DE USUARIO';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="usuario-index">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
             <h3><?= Html::encode($this->title) ?></h3> 
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 text-right">     
            <br>
                <?= Html::a('Registrar Usuario', ['usuario_insertar'], ['class' => 'btn btn-success ']) ?>           
        </div>
    </div>
   
    <div class="well">
       <div class="formulario-search">
                        <br>
                        <?php
                        $form = ActiveForm::begin([
                                    'layout' => 'horizontal',
                                    'action' => ['lista_usuario'],
                                    'method' => 'get',
                        ]);
                        ?>
                        <?= $form->field($model, 'palabraBuscar') ?>
                        <div class="form-group text-center">

                            <?=
                            Html::submitButton('BUSCAR', [
                                'class' => 'btn btn',
                                'style' => 'width:250px; background-color: #959292;',
                               
                            ])
                            ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
    </div>
    <div class="well">
         <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'idusuario',
            'nombre_usr',
            //'apellido_paterno_usr',
            'correo_usr',
            'usuario',
            'nombre_rol',
            'activate',
            // 'contrasenia',
            // 'conf_contrasenia',
             
            // 'accessToken',
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'ESTADO',
                'template' => '{estado}',
                'buttons' => [
                    'estado'=>  function ($url, $model){
                        if($model['activate']==1){
                            return Html::a('Activado',$url, ['title'=>'desactivar']);
                        }else{
                            return Html::a('Desactivado', $url, ['title'=>'Activar']);
                        }}],
                    'urlCreator'=>function($action, $model){
                          if($action=='estado')
                           { return Url::to(['usuario_estado', 'id'=>$model['idusuario']]);}  
                    }
                    ],
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'OPCION',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model['idusuario']]);
                        },
                    'update' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['modificar', 'id' => $model['idusuario'], 'id_rol' => $model['idrol'], 'id_usr_rol'=>$model['idusr_rol']]);
                        },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['usuario_eliminar', 'id' => $model['idusuario']], [
                                    'data' => [
                                        'confirm' => 'Esta seguro de que quiere eliminar?',
                        ],]);}
                ]   
            ],
        ],
    ]); ?>
    </div>
    <div class="well"></div>
   
</div>
