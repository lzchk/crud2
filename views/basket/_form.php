<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Basket $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="basket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\UserB::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'id_product')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
