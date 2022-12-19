<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Purchase $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_product')->textInput() ?>

    <?= $form->field($model, 'delivery_method')->dropDownList([ 'Самовывоз' => 'Самовывоз', 'Доставка курьером' => 'Доставка курьером', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'full_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_delivery')->textInput() ?>

    <?= $form->field($model, 'id_card')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'full_sale')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
