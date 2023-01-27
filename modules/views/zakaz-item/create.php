<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ZakazItem $model */

$this->title = 'Создать заказ с товарами';
$this->params['breadcrumbs'][] = ['label' => 'Zakaz Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakaz-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
