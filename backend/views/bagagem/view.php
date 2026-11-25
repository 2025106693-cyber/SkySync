<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */

$this->title = "Bagagem do bilhete: " . $model->bilhete->numero;
$this->params['breadcrumbs'][] = ['label' => 'Bagagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bagagem-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'bilhete.numero:text:Número do Bilhete',
            'tipoBagagem.nome:text:Tipo de Bagagem',
            [
                'attribute' => 'peso',
                'label' => 'Peso',
                'value' => function ($model) {
                    return $model->peso . " kg";
                }
            ],
            [
                'attribute' => 'preco',
                'label' => 'Preço',
                'value' => function ($model) {
                    return $model->preco . " €";
                }
            ],
        ],
    ]) ?>

</div>
