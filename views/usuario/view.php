<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->nombre_usr. " ".$model->apellido_paterno_usr." " .$model->apellido_materno_usr;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">
    <div class="well">
     <h3>Nombre: <?= Html::encode($this->title) ?></h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idusuario',
            'nombre_usr',
            'apellido_paterno_usr',
            'apellido_materno_usr',
            'celular_usr',
            'correo_usr',
            'usuario',
            'contrasenia',
            //'conf_contrasenia',
            'activate',
            'accessToken',
        ],
    ]) ?>
    </div>
    <div class="thumbnail text-right ">
        <p>
        <?= Html::a('Atras', ['lista_usuario'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Editar', ['update', 'id' => $model->idusuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idusuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>
</div>
