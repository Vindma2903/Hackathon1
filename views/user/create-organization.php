<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\SignupForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Создание карточки организации';
?>
<div class="site-organization-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста заполните все поля:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'organization-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-11 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-12 form-control'],
            'errorOptions' => ['class' => 'col-lg-11 invalid-feedback'],
        ],
    ]); ?>
        <?= $form->field($model, 'full_name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'abbreviated_name')->textInput() ?>
        <?= $form->field($model, 'date_registration')->textInput() ?>
        <?= $form->field($model, 'legal_address')->textInput() ?>
        <?= $form->field($model, 'postal_adress')->textInput() ?>
        <?= $form->field($model, 'phone')->input('phone') ?>
        <?= $form->field($model, 'email')->input('email') ?>
        <?= $form->field($model, 'director')->textInput() ?>
        <?= $form->field($model, 'inn')->textInput() ?>
        <?= $form->field($model, 'cat')->textInput() ?>
        <?= $form->field($model, 'okpo')->textInput() ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Создать', 
                ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
