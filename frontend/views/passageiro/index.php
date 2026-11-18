<?php

use common\models\Passageiro;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PassageiroSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Passageiros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passageiro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Passageiro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'nome',
            'tipo_documento',
            'numero_documento',
            //'nacionalidade',
            //'contacto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Passageiro $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
