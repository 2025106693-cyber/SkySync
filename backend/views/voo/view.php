<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Voo $model */

$this->title = "Voo " . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="voo-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'numero',
            'aviao.modelo:text:Modelo',
            'aeroportoOrigem.nome:text:Origem',
            'aeroportoDestino.nome:text:Destino',
            'hora_partida',
            'hora_chegada',
            'hora_partida_prevista',
            'hora_chegada_prevista',
            'preco_base',
            'estado',
            'porta_embarque',
        ],
    ]) ?>

<!--
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                ],
        ]) ?>
    </p>

-->
    <!--  ver mais tarde, lista de escalas de cada voo  -->
    <?php //foreach ($model->escalas as $escala){ ?>
    <p><?php //echo $escala->hora_chegada ?></p>
    <?php //} ?>

</div>
