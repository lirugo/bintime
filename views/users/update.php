<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>

    <div class="site-signup">
        <h1 class="text-center">User profile</h1>
        <?php
        $form = ActiveForm::begin([
            'options' => ['class' => 'form-signup'],
        ])
        ?>
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
        <?php ActiveForm::end() ?>

            <div class="col-md-9">
                <h3>Addresses</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Country</th>
                        <th scope="col">City</th>
                        <th scope="col">Street</th>
                        <th scope="col">House</th>
                        <th scope="col">Office</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($addresses as $address) {?>
                        <tr>
                            <th scope="row"><? echo $address->id ?></th>
                            <td><? echo $address->postcode ?></td>
                            <td><? echo $address->country ?></td>
                            <td><? echo $address->city ?></td>
                            <td><? echo $address->street ?></td>
                            <td><? echo $address->house ?></td>
                            <td><? echo $address->office ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <?php
                    // отображаем ссылки на страницы
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>