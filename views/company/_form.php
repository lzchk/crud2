<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\UserB::find()->all(), 'id','login')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput() ?>

    <?= $form->field($model, 'avatar')->textInput() ?>

    <?= $form->field($model, 'created_by')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\UserB::find()->all(), 'id','login')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
