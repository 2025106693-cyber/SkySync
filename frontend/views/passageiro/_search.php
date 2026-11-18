<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\PassageiroSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="passageiro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'tipo_documento') ?>

    <?= $form->field($model, 'numero_documento') ?>

    <?php // echo $form->field($model, 'nacionalidade') ?>

    <?php // echo $form->field($model, 'contacto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
