<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Passageiro $model */

$this->title = 'Create Passageiro';
$this->params['breadcrumbs'][] = ['label' => 'Passageiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passageiro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
