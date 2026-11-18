<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Voo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="voo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aviao_id')->textInput() ?>

    <?= $form->field($model, 'aeroporto_origem_id')->textInput() ?>

    <?= $form->field($model, 'aeroporto_destino_id')->textInput() ?>

    <?= $form->field($model, 'hora_partida')->textInput() ?>

    <?= $form->field($model, 'hora_chegada')->textInput() ?>

    <?= $form->field($model, 'hora_partida_prevista')->textInput() ?>

    <?= $form->field($model, 'hora_chegada_prevista')->textInput() ?>

    <?= $form->field($model, 'preco_base')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'agendado' => 'Agendado', 'partiu' => 'Partiu', 'aterrou' => 'Aterrou', 'atrasado' => 'Atrasado', 'cancelado' => 'Cancelado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'porta_embarque')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
