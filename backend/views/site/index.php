<?php

use common\models\CompanhiaAerea;
use common\models\User;
use common\models\Aeroporto;
use common\models\Voo;
use common\models\Bilhete;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;


$this->title = 'Administração';
$this->params['breadcrumbs'] = [['label' => $this->title]];

$username = Yii::$app->user->identity->username;
$role = array_key_first(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id));
$auth = Yii::$app->authManager;

$voos = Voo::find()->orderBy('hora_chegada')->all();


?>
<div class="container-fluid">



    <div class="row">
        <div class="col-12">
            <h3>Bem vindo, <?= Html::encode($username) ?>!</h3>
        </div>
    </div>

    <!-- Pessoas -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Utilizadores do Sistema',
                    'number' => User::find()->count(),
                    'icon' => 'fas fa-users',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Gestores Operacionais',
                    'number' => count($auth->getUserIdsByRole('gestor')),
                    'theme' => 'success',
                    'icon' => 'fas fa-user-tie',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Passageiros',
                    'number' => count($auth->getUserIdsByRole('passageiro')),
                    'theme' => 'info',
                    'icon' => 'fas fa-user',
            ]) ?>
        </div>
    </div>

    <!-- Operação -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Companhias Aéreas',
                    'number' => CompanhiaAerea::find()->count(),
                    'icon' => 'fas fa-plane',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Voos',
                    'number' => Voo::find()->count(),
                    'theme' => 'warning',
                    'icon' => 'fas fa-plane-departure',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Bilhetes Vendidos',
                    'number' => Bilhete::find()->count(),
                    'theme' => 'danger',
                    'icon' => 'fas fa-ticket-alt',
            ]) ?>
        </div>

    </div>

    <h3>Voos</h3>

    <table class="table table-striped">
        <tr>
            <th>Voo</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Partida</th>
            <th>Chegada</th>
            <th>Estado</th>
        </tr>

        <?php foreach ($voos as $voo): ?>
            <tr>
                <td><?= $voo->numero ?></td>
                <td><?= $voo->aeroportoDestino->nome ?></td>
                <td><?= $voo->aeroportoOrigem->nome ?></td>
                <td><?= $voo->hora_partida ?></td>
                <td><?= $voo->hora_chegada ?></td>
                <td><?= $voo->estado ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>