<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ImgProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="img-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_product')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'path')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
