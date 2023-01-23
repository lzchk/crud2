<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BankCard $model */

$this->title = 'Создание банковской карты';
$this->params['breadcrumbs'][] = ['label' => 'Bank Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
