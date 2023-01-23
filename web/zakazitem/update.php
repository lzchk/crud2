<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ZakazItem $model */

$this->title = 'Update Zakaz Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zakaz Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zakaz-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
