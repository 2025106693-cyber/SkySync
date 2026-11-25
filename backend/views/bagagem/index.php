<?php

use common\models\Bagagem;
use common\models\TipoBagagem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\BagagemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bagagens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagagem-index">

    <p>
        <?= Html::a('Criar Bagagem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //ver backend/models/BagagemSearch
            [
                'attribute' => 'bilhete_numero', // a caixa de pesquisa usa o atributo do BagagemSearch
                'label' => 'Número do Bilhete',
                'value' => 'bilhete.numero'     // relacao getBilhete
            ],
            [
                'attribute' => 'tipo_bagagem_id',
                'label' => 'Tipo de Bagagem',
                'value' => 'tipoBagagem.nome',
                // dropdown com os tipos de bagagem da BD (id => nome)
                'filter' => ArrayHelper::map(TipoBagagem::find()->all(), 'id', 'nome'),
                'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'Todos'],
            ],
            [
                'attribute' => 'peso',
                'filter' => false, // o false tira as caixas de cima
                'value' => function ($model) {
                    return $model->peso . " kg";
                }
            ],
            [
                'attribute' => 'preco',
                'label' => 'Preço',
                'filter' => false, // o false tira as caixas de cima
                'value' => function ($model) {
                    return $model->preco . " €";
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bagagem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
