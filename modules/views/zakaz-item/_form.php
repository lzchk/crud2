<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ZakazItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zakaz-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_purchase')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Purchase::find()->all(), 'id','id')) ?>

    <?= $form->field($model, 'id_product')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
