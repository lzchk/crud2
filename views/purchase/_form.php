<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Purchase $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_method')->dropDownList([ 'Самовывоз' => 'Самовывоз', 'Доставка курьером' => 'Доставка курьером', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'full_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_delivery')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\DeliveryAddress::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'id_card')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\BankCard::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'full_sale')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
