<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Bilhete $model */

$this->title = "Número do Bilhete: " .  $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Bilhetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bilhete-view">

<!--    <h1>--><?php //= Html::encode($model->numero) ?><!--</h1>-->

<!--    <p>-->
<!--        --><?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'numero',
                'passageiro.nome:text:Passageiro',
                'voo.numero:text:Voo',
            'preco_total',
            'check_in',
            'estado',
            'data_compra',
            'data_check_in',
        ],
    ]) ?>

</div>
