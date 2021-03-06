<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */

$attributes = [
    'posicion.posicion',
    'nombre',
    'dorsal',
    'fecha_nac:date',
    'edad',
    'equipo.nombre',
    'esta_lesionado:boolean',
    'esta_sancionado:boolean',
];
if ($model->esta_lesionado) {
    $attributes[] = 'fecha_alta:date';
    $attributes[] = 'diasLesion';
}

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['/equipos/index']];
$this->params['breadcrumbs'][] = ['label' => Html::encode($equipo), 'url' => ['/equipos/view', 'id' => Html::encode($model->id_equipo)]];
$this->params['breadcrumbs'][] = ['label' => 'Plantilla', 'url' => ['index', 'id_equipo' => Html::encode($model->id_equipo)]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jugador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => Html::encode($model->id)], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => Html::encode($model->id)], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar este jugador?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

    <?= $this->render('_estadisticas', [
        'model' => $model,
    ]) ?>

</div>
