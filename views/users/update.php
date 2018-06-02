<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'options' => ['class' => 'form-signup'],
]) ?>

    <div class="site-signup">
        <h1>User profile</h1>
        <p>U can update yor data</p>
        <div class="row">
            <div class="col-md-3">
                <h3>User data</h3>
                <?= $form->field($user, 'login')->textInput(['autofocus' => true]) ?>
                <?= $form->field($user, 'name')->textInput() ?>
                <?= $form->field($user, 'surname')->textInput() ?>
                <?= $form->field($user, 'sex')->dropDownList([
                    'male' => 'Male',
                    'female' => 'Female',
                    'no information'=> 'Do not specify'
                ]);?>
                <?= $form->field($user, 'email') ?>
                <div class="form-group">
                    <?= Html::submitButton('Update & Close', ['class' => 'btn btn-success pull-right', 'name' => 'signup-button']) ?>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end() ?>