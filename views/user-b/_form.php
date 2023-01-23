<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\UserB $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-b-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7 (999) 999 99 99',])->textInput(['placeholder' => $model->getAttributeLabel('phone')]);?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_city')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'date_of_birth')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'sex')->dropDownList([ 'муж' => 'Муж', 'жен' => 'Жен', 'не укажу' => 'Не укажу', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
