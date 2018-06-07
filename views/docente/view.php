<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */

$this->title = $model->nombre_doc. " ".$model->paterno_doc." " .$model->materno_doc;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-view">
    <div class="well">
     <h3>Nombre: <?= Html::encode($this->title) ?></h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'nombre_doc',
          'paterno_doc',
          'materno_doc',
          'correo_doc',
          'titulo_doc',
          'carga_horaria_doc',
          'telefono_doc',
          //'direccion_trad_doc',
          'perfil_doc',
          'ci_doc',
          'cod_sis_doc',
          //'cantidad_estu_tri',
        ],
    ]) ?>
    </div>
    <div class="thumbnail text-right ">
        <p>
        <?= Html::a('Atras', ['lista_docente'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Editar', ['update', 'id' => $model->iddocente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->iddocente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>
</div>
