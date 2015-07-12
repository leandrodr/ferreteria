<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Suppliers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suppliers-form">
	
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true])->label('Empresa') ?>

    <?= $form->field($model, 'account_number')->textInput(['maxlength' => true])->label('Carnet Identidad') ?>

    <?= $form->field($person, 'first_name')->textInput()->label('Nombres') ?>

    <?= $form->field($person, 'last_name')->textInput()->label('Apellidos') ?>

    <?= $form->field($person, 'phone_number')->textInput()->label('Celular') ?>

    <?= $form->field($person, 'email')->textInput() ?>

    <?= $form->field($person, 'address_1')->textInput()->label('Direccion') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
