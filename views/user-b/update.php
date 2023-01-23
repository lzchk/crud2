<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserB $model */

$this->title = 'Обновление пользователей: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-b-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
