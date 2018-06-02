<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-md-3">
            <h3>Enter user data</h3>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'name')->textInput() ?>
                <?= $form->field($model, 'surname')->textInput() ?>
                <?= $form->field($model, 'sex')->dropDownList([
                    'male' => 'Male',
                    'female' => 'Female',
                    'no information'=> 'Do not specify'
                ]);?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
        </div>

        <div class="col-md-3">
                <h3>Enter address</h3>
                <?= $form->field($model, 'postcode')->textInput(['type' => 'number']) ?>
                <?= $form->field($model, 'country')->textInput() ?>
                <?= $form->field($model, 'city')->textInput() ?>
                <?= $form->field($model, 'street')->textInput() ?>
                <?= $form->field($model, 'house')->textInput(['type' => 'number']) ?>
                <?= $form->field($model, 'office')->textInput(['type' => 'number']) ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-success pull-right', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>