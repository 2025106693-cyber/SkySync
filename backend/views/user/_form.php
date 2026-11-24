<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- vai buscar as constantes definidas ao common/models/user -->
    <?= $form->field($model, 'status')->dropDownList([
        User::STATUS_ACTIVE => 'Ativo',
        User::STATUS_INACTIVE => 'Inativo',
    ]) ?>

    <!-- cargo (fica na tabela auth_assignment, por isso não é um field do model) -->
    <div class="form-group">
        <label class="control-label">Cargo</label>

        <?= Html::dropDownList('role', array_key_first(Yii::$app->authManager->getRolesByUser($model->id)), [
                'admin' => 'Admin',
                'gestor' => 'Gestor',
                'passageiro' => 'Passageiro',
        ], ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
