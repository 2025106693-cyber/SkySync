<?php

use common\models\Bilhete;
use common\models\TipoBagagem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bagagem-form">

    <?php $form = ActiveForm::begin(); ?>


    <!-- isNewRecord verifica se o objeto ja existe na BD, true para o create, false para o update -->
    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'bilhete_id')->dropDownList(
            ArrayHelper::map(Bilhete::find()->all(), 'id', 'numero'),
            ['prompt' => 'Escolha o bilhete']
        )->label('Bilhete') ?>
    <?php endif; ?>


    <?= $form->field($model, 'tipo_bagagem_id')->dropDownList(
            ArrayHelper::map(TipoBagagem::find()->all(), 'id', 'nome') // transforma a lista que foi buscar num array com id => nome
    )->label('Tipo de bagagem') ?>

    <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
