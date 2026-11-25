<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */

$this->title = "Bagagem do bilhete: " . $model->bilhete->numero;
$this->params['breadcrumbs'][] = ['label' => 'Bagagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bagagem-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
