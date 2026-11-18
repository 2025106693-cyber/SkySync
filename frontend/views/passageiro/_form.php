<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Passageiro $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="passageiro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_documento')->dropDownList([ 'cc' => 'Cc', 'passaporte' => 'Passaporte', 'outro' => 'Outro', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'numero_documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nacionalidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
