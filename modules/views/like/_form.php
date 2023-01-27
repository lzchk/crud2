<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Like $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="like-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_product')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'id_user')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
